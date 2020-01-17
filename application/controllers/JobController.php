<?php

    class JobController extends CI_Controller{


    public function __construct() {
        parent::__construct();
        $this->user_id = user('id');
        $this->role_id = user('role');
        $this->load->library('user_agent');
        $this->load->model('weserve_sap');
    }
    public function index($data = null) {
        
    }
    

    //emil added
    public function checkturnoverdate($date){
        $new_date = date("m/d/Y", strtotime($date));
        $tempDate = explode('/' , $new_date);
        return checkdate($tempDate[1] , $tempDate[2] , $tempDate[0]);
    }
    
    //Job Checking to check the qualified turn over 
    public function job_check_for_qualified_turnover_date(){
        date_default_timezone_set('Asia/Manila');
        $qualified = $this->Admin_model->get_turn_over_qualifieds();
       
        foreach($qualified as $data){
            $customer_number = $data->customer_number;
            $project = $data->project;
            $runitid = $data->runitid;
            $approved_turnover = $data->approved_turnover_date;
            $accepted_handover = $data->accepted_handover_date;
            $qualified_turnover = $data->qualified_turnover_date;
            
           if (!empty($approved_turnover)){
                //Update the qualified turnover fields 
                $update_qualified_turnover = $this->Admin_model->update_qualified_turnover_date(date("Y/m/d H:i:s") , $customer_number);
                $update_unit_status = $this->Admin_model->update_status_unit($project , $runitid);

                $detail = $this->Admin_model->get_customer_by_custnum($customer_number);
                $message = "Greetings from Federal Land, Inc.! Please be advised that a NOTICE OF INSPECTION for your unit was forwarded to your recorded address and contact details. Thank you, and we hope to hear from you soon! ";
                $return_email = $this->send_email($detail->email_address, 'WeServe', $message);
                $return_sms = $this->send_sms($detail->mobile_number, $message);
               
           }else{
               //Do Nothing
           }
        }
    }

    //Job for Creating tickets 
    public function job_check_for_qualified_exceed_24hrs(){
        $date_now = date("Y-m-d");
        $qualified = $this->Admin_model->get_turn_over_qualified($date_now);
        $user_id = '0';
        $email = '';
            
        foreach($qualified as $data){
            date_default_timezone_set('Asia/Manila');
            $customer_number = $data->customer_number;
            $project = $data->project;
            $qualified = $data->TIME;
            $time_now = strtotime("now");
            $qualified_hour_str = strtotime($data->qualified_turnover_date);
            $email_address = "";

            //Check if the turn over date exceed in 24 Hours
            //$interval = ($time_now - $qualified_hour_str);
            $difference = abs($qualified_hour_str - $time_now)/(60*60);
            $tickets = $this->Admin_model->get_all_tickets();
            $ticket_number = $project .'-'. date("Y"). '-' .sprintf("%'.05d\n", count($tickets)+1);

            $chcktheschedule = $this->Admin_model->get_schedule_for_turnover($customer_number);
             if ($difference >= 24){
                //If the the customer has no schedule Ticket will be assign to outbound. But if has schedule 
                //ticket will be assign to handover
                if(count($chcktheschedule) == 0){
                    //$project = $this->input->post('project'); 
                    $o_associates = array();
                    $outbounds = $this->Admin_model->get_all_outbound_associate();
                        foreach ($outbounds as $outbound) {
                            $o_associates[] = $outbound->user_id;

                        }
                    $outbound_rand = array_rand($o_associates);
                    $outbound_assigned = $o_associates[$outbound_rand];
                    $insert_ticket = array(
                        'ticket_number' => $ticket_number,
                        'customer_number' => $customer_number,
                        'created_by' => $user_id,
                        'category' => 'Turnover',
                        'subject' => 'For Callout job (System Generated)',
                        'assigned_to' => $outbound_assigned,
                        'date_assigned' => date("Y/m/d H:i s")
                        );

                    $insert_id = $this->Admin_model->add_ticket($insert_ticket);  
                   
                    if ($insert_id > 0){
                        //Insert ticket status in db after assigning the tickets
                        $ticket_status_data_insertion = array(
                            array(
                                'ticket_number' => $ticket_number,
                                'status' => 0,
                                'assign_to' => '',
                                'user_section' => 'INBOUND_ASSOC',
                                'activity_status' => 0
                            ),
                            array(
                                'ticket_number' => $ticket_number,
                                'status' => 0,
                                'assign_to' => $outbound_assigned,
                                'user_section' => 'OUTBOUND_ASSOC',
                                'activity_status' => 0
                            ),
                            array(
                                'ticket_number' => $ticket_number,
                                'status' => 0,
                                'assign_to' => '',
                                'user_section' => 'HANDOVER_ASSOC',
                                'activity_status' => 0
                            )
                        );
                        $this->db->insert_batch('tbl_ticket_status', $ticket_status_data_insertion);

                        //Send Email to assigned ticket
                        $outbond_details = $this->Admin_model->get_user_detail($outbound_assigned , '7');
                        foreach($outbond_details as $outbond_detail){
                            $email_address_outbond = $outbond_detail->email_address;
                            $message = "Ticket was successfully assigned to you...";
                            $send_email = $this->send_email($email_address_outbond, 'TICKET ASSIGNED', $message);
                            if($send_email == true) { // && $return_sms == true
                                echo "<script type='text/javascript'>alert('Email notification will be sent to Unit Owner. Selected schedule will be temporarily blocked for 24 hours and will be fully blocked once received confirmation from Unit Owner by replying YES to SMS and email message or clicking the link provided or providing the OTP to Inbound Associate.');</script>";
                            } else {
                                echo "<script type='text/javascript'>alert('Failure to send the email notification.');</script>";
                            }
                        }
                    }
                }else{
                    foreach($chcktheschedule as $data){
                        //assign to hand over associate
                            $ticket_number = $data->ticket_number;
                            $customer_number = $data->customer_number;
                            
                            $hand_associates = array();
                            $handovers = $this->Admin_model->get_all_handover_associate();
                            foreach ($handovers as $handover) {
                                $hand_associates[] = $handover->user_id;
                            }
        
                            $hand_rand = array_rand($hand_associates);
                            $hand_assigned = $hand_associates[$hand_rand];
                            
                            $insert_ticket = array(
                            'ticket_number' => $ticket_number,
                            'customer_number' => $customer_number,
                            'created_by' => $user_id,
                            'category' => 'Turnover',
                            'subject' => 'For Schedule Confirmation (System Generated)',
                            'assigned_to' => $hand_assigned,
                            'date_assigned' => date("Y/m/d H:i s")
                            ); 

                            $insert_id = $this->Admin_model->add_ticket($insert_ticket); 

                            if ($insert_id > 0){
                                 //Insert ticket status in db after assigning the tickets
                                $ticket_status_data_insertion = array(
                                    array(
                                        'ticket_number' => $ticket_number,
                                        'status' => 0,
                                        'assign_to' => '',
                                        'user_section' => 'INBOUND_ASSOC',
                                        'activity_status' => 0
                                    ),
                                    array(
                                        'ticket_number' => $ticket_number,
                                        'status' => 0,
                                        'assign_to' => '',
                                        'user_section' => 'OUTBOUND_ASSOC',
                                        'activity_status' => 0
                                    ),
                                    array(
                                        'ticket_number' => $ticket_number,
                                        'status' => 0,
                                        'assign_to' => $hand_assigned,
                                        'user_section' => 'HANDOVER_ASSOC',
                                        'activity_status' => 0
                                    )
                                );
                                $this->db->insert_batch('tbl_ticket_status', $ticket_status_data_insertion);

                                //Send Email to assigned ticket
                                $handover_details = $this->Admin_model->get_user_detail($hand_assigned , '10');
                                foreach($handover_details as $handover_detail){
                                    $email_address_head = $handover_detail->email_address;
                                    $message = "Ticket was successfully assigned to you...";
                                    $send_email = $this->send_email($email_address_head, 'TICKET ASSIGNED', $message);
                                    if($send_email == true) { // && $return_sms == true
                                        echo "<script type='text/javascript'>alert('Email notification will be sent to Unit Owner. Selected schedule will be temporarily blocked for 24 hours and will be fully blocked once received confirmation from Unit Owner by replying YES to SMS and email message or clicking the link provided or providing the OTP to Inbound Associate.');</script>";
                                    } else {
                                        echo "<script type='text/javascript'>alert('Failure to send the email notification.');</script>";
                                    }
                                }
                            }
                    } 
                }
      }
    }
    }

    //Job for parking
    public function job_for_parking(){
        $parkings = $this->Admin_model->get_turn_over_parking();

        foreach($parkings as $parking){
            $approved_turn_over = $parking->approved_turn_over;
            $accepted_oomc = $parking->accepted_oomc;

            if($parking->type === 'PK'){
                if (!$approved_turn_over == 0){
                    if (!$accepted_oomc == 0){
                         //Update the  
                         $update_qualified_turnover = $this->Admin_model->update_qualified_turnover_date(date("Y/m/d H:i:s") , $customer_number);
                         $update_unit_status = $this->Admin_model->update_status_unit($project , $runitid);
                    }else{
                        //Do Nothing
                    }
                }else{
                    //Do Nothing
                }
            }
        }
    }


    //Job for sending the link to owner users
    public function job_send_link_for_scheduling(){
        $qualified = $this->Admin_model->get_turn_over_qualifieds();

        foreach($qualified as $data){
            $customer_number = $data->customer_number;
            $project = $data->project;
            $runitid = $data->runitid;
            $type = $data->type;
            $accepted_qcd = $data->accepted_qcd;
            $accepted_handover = $data->accepted_handover;
            $qualified_turnover = $data->qualified_turnover_date;
            
            if (!empty($accepted_qcd)){
                if(!empty($accepted_handover)){
                    $get_customers = $this->Admin_model->get_buyers_by_customer_number($customer_number);
                    //Check the parking if with unit
                    if ($type === 'PK'){
                        foreach($get_customers as $get_customer){
                            //get the tin of tag as parking
                            $tin_number = $get_customer->tin;
                            //Get customer number by tin
                            $get_customer_by_tins = $this->Admin_model->get_tin_by_customer_number($tin_number);
                            //Store the return customer number to array
                            $return_customer_numbers = array();
                            foreach ($get_customer_by_tins as $get_customer_by_tin) {
                                $return_customer_numbers[] = $get_customer_by_tin->customer_number;
                            }
                            //Loop to each customer number on the array to get the bundled unit
                            foreach($return_customer_numbers as $return_customer_number){
                                $get_buyers_transacs = $this->Admin_model->get_buyers_trans($return_customer_number);
                                foreach($get_buyers_transacs as $get_buyers_transac){
                                    $unit_type = $get_buyers_transac->type;
                                    $qualified_un = $get_buyers_transac->qualified_turnover_date;
                                    if($unit_type == "UN"){
                                        //If the qualified turn over of parking is greater than the qualified turnover of unit 
                                        //Not valid of scheduling
                                        if($qualified_turnover < $qualified_un){
                                            $search_for_tickets = $this->Admin_model->get_ticket_number_by_customer_number($customer_number);
                                            foreach($search_for_tickets as $data){
                                                $ticket_id = $data->id;
                                                $email = $data->email_address;
                                                $encrypt_ticket_id = $this->dec_enc($ticket_id , 'encrypt');
                        
                                                $link = base_url()."default_user/schedule/". $encrypt_ticket_id;
                                                //echo "<script>alert('". $ticket_id ."');</script>";
                                                $this->send_email($email, "WESERVE - For Scheduling link" , $link);
                        
                                                //Save the link to the database
                                                $datas = array(
                                                    'ticket_number' => $data->ticket_number ,
                                                    'temp_link' => $link , 
                                                    'status' => '0' , 
                                                    'date_created' =>  $date_now =  date("Y/m/d H:i:s")
                                                );
                                                $this->Admin_model->save_link_to_db($datas);
                                            }
                                        }else{
                                            //Do nothing
                                        }
                                    }
                                }
                            }
                        }
                    }else{
                        //If the unit is not parking sched the other type
                        //parking is important kasi ano need siya eh wag ka ano.
                        $search_for_tickets = $this->Admin_model->get_ticket_number_by_customer_number($customer_number);
                        foreach($search_for_tickets as $data){
                            $ticket_id = $data->id;
                            $email = $data->email_address;
                            $encrypt_ticket_id = $this->dec_enc($ticket_id , 'encrypt');

                            $link = base_url()."default_user/schedule/". $encrypt_ticket_id;
                            //echo "<script>alert('". $ticket_id ."');</script>";
                            $this->send_email($email, "WESERVE - For Scheduling link" , $link);

                            //Save the link to the database
                            $data = array(
                                'ticket_number' => $data->ticket_number ,
                                'temp_link' => $link , 
                                'status' => '0' , 
                                'date_created' =>  $date_now =  date("Y/m/d H:i:s")
                            );
                            $this->Admin_model->save_link_to_db($data);
                        }
                    }
                }else{
                    //Do Nothing
                }
            }else{
                    //Do Nothing
            }
        }
        
    }


    //Emil Added for weserve Job 12/19/19
    //SMS and Email to Unit Owner if No schedule beyond 15 working days
    public function job_no_schedule_beyond_15_working_days(){
        $date_now = date("Y-m-d");
        $qualified = $this->Admin_model->get_turn_over_qualified($date_now);
        $user_id = '0';
        $email = '';
            
        foreach($qualified as $data){
            date_default_timezone_set('Asia/Manila');
            $customer_number = $data->customer_number;
            $project = $data->project;
            $qualified = $data->TIME;
            $time_now = strtotime("now");
            $qualified_hour_str = strtotime($data->qualified_turnover_date);
            $email_address = "";

            //Check if the turn over date exceed in 24 Hours
            //$interval = ($time_now - $qualified_hour_str);
            //$difference = abs($qualified_hour_str - $time_now)/(60*60);
            $working_days = $this->Admin_model->get_workingdays($data->qualified_turnover_date, $date_now);
            $tickets = $this->Admin_model->get_all_tickets();
            $ticket_number = $project .'-'. date("Y"). '-' .sprintf("%'.05d\n", count($tickets)+1);

            $chcktheschedule = $this->Admin_model->get_schedule_for_turnover($customer_number);
            $customer_detail = $this->Admin_model->get_buyers_by_customer_number($customer_number);

             //Check if the costumer has no schedule if has no schedule for beyond 15 working days
             //Email the Owner that he/she has no schedule and assign ticket to outbound and email the
             //The outbound that ticket has been assigned to him.
             //echo '<script>alert(alert(aass);</script>';

             foreach($working_days as $days){
                 $d = $days->days; 
                 if ($d >= 15){
                    if(count($chcktheschedule) == 0){

                        //For Unit Owner sending email
                        foreach ($customer_detail as $detail) {
                            $email_address = $detail->email_address;

                            $message = "NO SCHEDULE MORE THAN 15 DAYS .....";

                            $send_email = $this->send_email($email_address, 'Notification about Schedule', $message);
                            if($send_email == true) { // && $return_sms == true
                                echo "<script type='text/javascript'>alert('Email notification will be sent to Unit Owner. Selected schedule will be temporarily blocked for 24 hours and will be fully blocked once received confirmation from Unit Owner by replying YES to SMS and email message or clicking the link provided or providing the OTP to Inbound Associate.');</script>";
                            } else {
                                echo "<script type='text/javascript'>alert('Failure to send the email notification.');</script>";
                            }
                        }
                        
                        //For Outbound tickets
                        $o_associates = array();
                        $outbounds = $this->Admin_model->get_all_outbound_associate();
                            foreach ($outbounds as $outbound) {
                                $o_associates[] = $outbound->user_id;
                            }
                        $outbound_rand = array_rand($o_associates);
                        $outbound_assigned = $o_associates[$outbound_rand];
                        $insert_ticket = array(
                            'ticket_number' => $ticket_number,
                            'customer_number' => $customer_number,
                            'created_by' => $user_id,
                            'category' => 'Turnover',
                            'subject' => 'For Callout job 15 days no schedule (System Generated)',
                            'assigned_to' => $outbound_assigned,
                            'date_assigned' => date("Y/m/d H:i s")
                            );

                        $insert_id = $this->Admin_model->add_ticket($insert_ticket);  
                    
                        if ($insert_id > 0){
                               //Insert ticket status in db after assigning the tickets
                              $ticket_status_data_insertion = array(
                            array(
                                    'ticket_number' => $ticket_number,
                                    'status' => 0,
                                    'assign_to' => '',
                                    'user_section' => 'INBOUND_ASSOC',
                                    'activity_status' => 0
                                ),
                                array(
                                    'ticket_number' => $ticket_number,
                                    'status' => 0,
                                    'assign_to' => $outbound_assigned,
                                    'user_section' => 'OUTBOUND_ASSOC',
                                    'activity_status' => 0
                                ),
                                array(
                                    'ticket_number' => $ticket_number,
                                    'status' => 0,
                                    'assign_to' => '',
                                    'user_section' => 'HANDOVER_ASSOC',
                                    'activity_status' => 0
                                )
                            );
                            $this->db->insert_batch('tbl_ticket_status', $ticket_status_data_insertion);
                    
                            //Send Email to assigned ticket
                            $outbond_details = $this->Admin_model->get_user_detail($outbound_assigned , '7');
                            foreach($outbond_details as $outbond_detail){
                                $email_address_outbond = $outbond_detail->email_address;
                                $message = "Ticket was successfully assigned to you...";
                                $send_email = $this->send_email($email_address_outbond, 'TICKET ASSIGNED', $message);
                                if($send_email == true) { // && $return_sms == true
                                    echo "<script type='text/javascript'>alert('Email notification will be sent to Unit Owner. Selected schedule will be temporarily blocked for 24 hours and will be fully blocked once received confirmation from Unit Owner by replying YES to SMS and email message or clicking the link provided or providing the OTP to Inbound Associate.');</script>";
                                } else {
                                    echo "<script type='text/javascript'>alert('Failure to send the email notification.');</script>";
                                }
                            }
                        }
                    }else{
                        //Do Nothing
                    }
                }else{
                    //Do Nothing
                } 
            }
        }


    }

    //Emil Added for weserve Job 12/20/19
    //SMS and Email to Unit Owver for Deemed legally accepted
      public function job_for_deemed_legally_accepted(){
        $date_now = date("Y-m-d");
        $qualified = $this->Admin_model->get_turn_over_qualified($date_now);
        $user_id = '0';
        $email = '';
            
        foreach($qualified as $data){
            date_default_timezone_set('Asia/Manila');
            $customer_number = $data->customer_number;
            $project = $data->project;
            $runitid = $data->runitid;
            $qualified = $data->TIME;
            $time_now = strtotime("now");
            $qualified_hour_str = strtotime($data->qualified_turnover_date);
            $email_address = "";

            //Check if the turn over date exceed in 24 Hours
            //$interval = ($time_now - $qualified_hour_str);
            //$difference = abs($qualified_hour_str - $time_now)/(60*60);
            $working_days = $this->Admin_model->get_workingdays($data->qualified_turnover_date, $date_now);
            $tickets = $this->Admin_model->get_all_tickets();
            $ticket_number = $project .'-'. date("Y"). '-' .sprintf("%'.05d\n", count($tickets)+1);

            $chcktheschedule = $this->Admin_model->get_schedule_for_turnover($customer_number);
            $customer_detail = $this->Admin_model->get_buyers_by_customer_number($customer_number);

             //Check if the costumer has no schedule if has no schedule for 30 working days
             

             //Email the Owner that he/she has no schedule and assign ticket to outbound and email the
             //The outbound that ticket has been assigned to him.
             foreach($working_days as $days){
                 $d = $days->days; 
                 if($d == 31){
                    if(count($chcktheschedule) == 0){
                        //For Unit Owner sending email
                        foreach ($customer_detail as $detail) {
                            $email_address = $detail->email_address;
                            $mobile_number = $detail->mobile_number;
                            $message = "NO SCHEDULE MORE THAN 30 DAYS DEEMED LEGALLY ACCEPTED.....";

                            $send_email = $this->send_email($email_address, 'WeServe', $message);
                            $send_sms = $this->send_sms($mobile_number, $message);
                            if($send_email == true && $send_sms == true) { // && $return_sms == true
                                echo "<script type='text/javascript'>alert('Email and SMS notification will be sent to Unit Owner.');</script>";
                            } else {
                                echo "<script type='text/javascript'>alert('Failure to send the notification.');</script>";
                            }
                        }
                        //Update status of unit to Deemed legally accepted
                        $updatestatus = $this->Admin_model->update_units_status('15' , $project , $runitid);
                    }else{
                        //Do Nothing
                    }
                 }else if($d >= 44){
                    if(count($chcktheschedule) == 0){

                        //For Unit Owner sending email
                        foreach ($customer_detail as $detail) {
                            $email_address = $detail->email_address;
                             $mobile_number = $detail->mobile_number;
                            $message = "NO SCHEDULE MORE THAN 45 DAYS DEEMED LEGALLY ACCEPTED.....";

                            $send_email = $this->send_email($email_address, 'WeServe', $message);
                            $send_sms = $this->send_sms($mobile_number, $message);
                            if($send_email == true && $send_sms == true) { // && $return_sms == true
                                echo "<script type='text/javascript'>alert('Email and SMS notification will be sent to Unit Owner.');</script>";
                            } else {
                                echo "<script type='text/javascript'>alert('Failure to send the notification.');</script>";
                            }
                        }
                        //Update status of unit to Deemed legally accepted
                        $updatestatus = $this->Admin_model->update_units_status('15' , $project , $runitid);
                    }else{
                        //Do Nothing
                    }
                }
            }
        }
    }


    //Emil Added for weserve Job 12/20/19.
    //SMS and Email notify the assigned Handover Associate three working days prior the schedule 
    public function job_for_handover_associate_three_working_day(){
        $date_now = date("Y-m-d");
        $schedule = $this->Admin_model->get_all_sched_for_hand_over($date_now);

        foreach($schedule as $data){
            $working_days = $this->Admin_model->get_workingdays($date_now , $data->schedule);
            foreach($working_days as $day){
                if ($day->days == 3){
                    //Email the assign hand over
                    $email_address_hand = $data->email_address;
                    $message = "You have schedule for the date of " . $data->schedule;
                    $send_email = $this->send_email($email_address_hand, 'WESERVE - SCHEDULE REMINDER', $message);
                    if($send_email == true) { // && $return_sms == true
                        echo "<script type='text/javascript'>alert('Email notification will be sent to Unit Owner. Selected schedule will be temporarily blocked for 24 hours and will be fully blocked once received confirmation from Unit Owner by replying YES to SMS and email message or clicking the link provided or providing the OTP to Inbound Associate.');</script>";
                    } else {
                        echo "<script type='text/javascript'>alert('Failure to send the email notification.');</script>";
                    }
                }else{
                    //Do Nothing
                     }
            }
        }
    }   

    //Emil Added for weserve job 12/20/19
    //Acceptance of unit from QCD
    public function job_acceptance_of_units_from_qcd(){
        date_default_timezone_set('Asia/Manila');
        $date_now = date("Y-m-d h:i:s");
       
        $accepted_acd = $this->Admin_model->get_all_acceptance_of_unit_from_qcd();

        foreach($accepted_acd as $accept){
            $date = $accept->accepted;
            //Check if the field of accepted_qcd has valid or not empty
            if(!empty($date)){
                $timediff = $this->Admin_model->get_time_diff($date_now , $date);
                //var_dump($timediff);exit();
                foreach($timediff as $data){
                    $timediff = $data->timediff;
                    if ($timediff >= '24:00:00'){
                        $get_nearest_sched = $this->Admin_model->get_nearest_sched($date_now , $accept->customer_number);
                        foreach($get_nearest_sched as $nereast){
                            $email_hand_assign_nearest = $this->Admin_model->get_user_by_ids($nereast->assigned_to);
                            foreach($email_hand_assign_nearest as $datanearest){
                                $message = "HI! schcedule accepted UNIT by QCD......";
                                $send_email = $this->send_email($datanearest->email_address, 'Notification about Schedule Accepted by QCD', $message);
                                //Create ticket for hand_over 
                                    //BRD - > 6.6.3 Acceptance of Unit from QCD
                                    $ticket_creation = $this->Admin_model->create_ticket($accept->project);
                                    var_dump($ticket_creation);exit();
                                    $ticket_date = array(
                                        "ticket_number" => $ticket_creation->ticket_number,
                                        "customer_number" => $accept->customer_number,
                                        "created_by" => 0,
                                        "category" => "Acceptanced QCD",
                                        "subject" => "Acceptance of Unit from QCD to Handover",
                                        "assigned_to" => $nereast->assigned_to,
                                        "date_assigned" => date("Y/m/d H:i s")
                                    );
                                    $insert_ticket_id = $this->Admin_model->add_ticket($ticket_date);
                                 
                                if($send_email == true){ 
                                    echo "<script type='text/javascript'>alert('Email notification will be sent to Unit Owner. Selected schedule will be temporarily blocked for 24 hours and will be fully blocked once received confirmation from Unit Owner by replying YES to SMS and email message or clicking the link provided or providing the OTP to Inbound Associate.');</script>";
                                }else{
                                    echo "<script type='text/javascript'>alert('Failure to send the email notification.');</script>";
                                }
                            }
                        }
                    }else{
                        //echo "<script>alert('Less than 24 hour');</script>";
                    }
                }
               
            }else{
                //Do Nothing
            }
        } 
    }

    //Emil Added for weserve jo 12/20/19
    //SMS and Email There will be notifications to the Unit Owner every end of day if the status is Qualified for Turnover and without schedule.
    public function job_daily_notify_for_qualified_no_shed_status(){
        date_default_timezone_set('Asia/Manila');
        $date_now = date("Y-m-d");

        $qualified_turnover = $this->Admin_model->get_all_qualified_for_turn_over();

        foreach ($qualified_turnover as $data) {
            if (!empty($data->qualified)){
                $schedule = $this->Admin_model->check_schedule_by_customer_number($data->customer_number);
                if (empty($schedule)){
                    $detail_buyer = $this->Admin_model->get_customer_by_number($data->customer_number);
                    foreach($detail_buyer as $buyers){
                      $message = "Greetings from Federal Land, Inc.! Please be advised that we are still awaiting your preferred turnover schedule. You may reach us through the contact details provided in the Notice of Inspection / Notice of Unit Turnover. Thank you.";
                        $send_email = $this->send_email($buyers->email_address, 'WeServe', $message);
                        $send_sms = $this->send_sms($buyers->mobile_number, $message);

                       if($send_email == true && $send_sms == true) { // && $return_sms == true
                           echo "<script type='text/javascript'>alert('Email notification will be sent to Unit Owner. Selected schedule will be temporarily blocked for 24 hours and will be fully blocked once received confirmation from Unit Owner by replying YES to SMS and email message or clicking the link provided or providing the OTP to Inbound Associate.');</script>";
                       }else{
                           echo "<script type='text/javascript'>alert('Failure to send the notification.');</script>";
                       }
                   } 
                }else{
                    //Do Nothing
                }
            }else{
                //Do Nothing
            }
        }
    }

 //Emil Added for weserve job buyers_transac
    //To fill the table tbl_buyers_trasanc
    public function job_buyers_transanc(){
        //ini_set('max_execution_time', 0);
        $date_now = date("Y-m-d");
        $filename = "units_transaction_with_customer_number_" . $date_now . ".json";
        //$pagination = 1;
        $params = 'Units';
        $limiter = 1;

        while(true){
            $resources = $this->weserve_sap->all($params ,[
                'type' => 'paginate',
                'index'=> $limiter,
                'limit' => 50
            ]);

            $json_units = json_decode($resources , true);  
           
            //Exit the loop when resource is finish
            if ($resources){
                file_put_contents($filename , print_r($resources , true));
            
            $url = 'units_transaction_with_customer_number_2020-01-06.json'; // path to your JSON file
            $data = file_get_contents($filename); // put the contents of the file into a variable
            $json_data = json_decode($data, true);
            
            for($i =0; $i < count($json_data); $i++){
                $bukrs = $json_data[$i]['BUKRS'];
                $swenr = $json_data[$i]['SWENR'];
                $smenr = $json_data[$i]['SMENR'];
                $swenr_exploded = explode("-",$swenr);
                //Get the unit Sales Orders
                $params_spec_units = 'Companies/' . $bukrs . '/Towers/' . $swenr . '/Units/' . $smenr . '/SalesOrders?active=true';
                //Get all sales order by the company code , tower and unitid
                $get_specific_unit = $this->weserve_sap->all($params_spec_units);
                

                if($get_specific_unit){
                    $json_spec_unit = json_decode($get_specific_unit , true);
                    //$spec_length = count($json_spec_unit);
                    $data = array();
                    for ($s = 0; $s < count($json_spec_unit); $s++){
                        if (!empty(count($json_spec_unit))){
                            $sold_to = $json_spec_unit[$s]['SOLD_TO'];
                            $customer_number = $json_spec_unit[$s]['SOLD_TO'];
                            $tower = $swenr_exploded['0'];
                            $runitid = $smenr;
                            $type = $json_data[$i]['UNIT_TYPE']['ZZSALES_UNIT_TYPE']['UNIT_TYPE_CODE'];
                            $accepted_qcd = $json_data[$i]['TURNOVER_DATE']['QCD_TO_CEG'];
                            $accepted_handover = $json_data[$i]['TURNOVER_DATE']['TURN_OVER_DATE'];
                            $accepted_oomc = $json_data[$i]['TURNOVER_DATE']['OOMCACCEPT_DATE'];
                            $occ_per_date = $json_data[$i]['TURNOVER_DATE']['OCC_PER_DATE'];
                            $tagged_no_show = $json_data[$i]['TURNOVER_DATE']['TAG_NOSHOW'];
                            
                            //Call Stored Procudure
                            //$InsertBuyersTransac = $this->db->query('CALL InsertBuyersTransac ("'.$customer_number.'","'.$tower.'","'.$runitid.'","'.$type.'","'.$accepted_qcd.'","'.$accepted_handover.'","'.$accepted_oomc.'","'.$occ_per_date.'","'.$tagged_no_show.'")');
                            //Check if the record exists
                            $chck_dup = $this->Admin_model->chck_dup_in_transactions($customer_number , $tower , $runitid , $type , $accepted_qcd , $accepted_handover , $accepted_oomc , $occ_per_date , $tagged_no_show);
                           
                            //Update if the record if exists
                            //Insert if not exist
                            if($chck_dup->result === '1'){
                                $insert_buyer_transac = array(
                                    'customer_number' => $customer_number,
                                    'tower' => $tower,
                                    'runitid' => $runitid,
                                    'type' => $type ,
                                    'accepted_qcd' => $accepted_qcd ,
                                    'accepted_handover' => $accepted_handover,
                                    'accepted_oomc' => $accepted_oomc,
                                    'occ_per_date' => $occ_per_date,
                                    'tagged_no_show' => $tagged_no_show
                                );
                                $update_dups_record_buyes_transac = $this->Admin_model->update_dups_record_buyes_transac($customer_number , $tower , $runitid , $type , $accepted_qcd , $accepted_handover , $accepted_oomc , $occ_per_date , $tagged_no_show);
                               
                            }else{
                                $insert_buyer_transac = array(
                                    'customer_number' => $customer_number,
                                    'tower' => $tower,
                                    'runitid' => $runitid,
                                    'type' => $type ,
                                    'accepted_qcd' => $accepted_qcd ,
                                    'accepted_handover' => $accepted_handover,
                                    'accepted_oomc' => $accepted_oomc,
                                    'occ_per_date' => $occ_per_date,
                                    'tagged_no_show' => $tagged_no_show
                                );
                                //$insert = $this->Admin_model->insert_buyer_transac($insert_buyer_transac);
                            }
                        }else{
                            //Do Nothing
                        }
                    }
                }
            }
            }else{
                break;
            }
            
            
        }
    }


    //For Sending of Email for unit owner for schedule confirmation (After scheduling)
    public function send_email_for_confirmation(){
        $customer_number = $this->input->post('customer_number');
        $encrypt_customer_number = $this->dec_enc($customer_number,'encrypt');
        $get_customers = $this->Admin_model->get_customer_by_custnum($customer_number);

        foreach($get_customers as $get_customer){
            $get_customer_email = $get_customer->email_address;
            $get_customer_mobile = $get_customer->mobile_number;
            $message = "Here's the link to confirm you schedule...";
            $link = base_url()."default_user/schedule_confirmation/". $encrypt_customer_number;
            $send_email = $this->send_email($get_customer_email, 'WeServe', $message . ' ' . $link );
            $send_sms = $this->send_sms($get_customer_mobile,  $message . ' ' . $link );
            if($send_email == true && $send_sms == true) { // && $return_sms == true
                echo "<script type='text/javascript'>alert('Email and SMS notification will be sent to Unit Owner.');</script>";
            } else {
                echo "<script type='text/javascript'>alert('Failure to send the email notification.');</script>";
            }
        }
    }


     //Emil
    //Send SMS and Email to Outboun after 3 failed call attempt per day  (if no success call attempt yet)
    public function job_notify_outbound_for_callout(){
        $date_now = date("Y-m-d");
        $status_log = array();
        $message = "";
        $get_tickets_for_call_outs = $this->Admin_model->get_tickets_for_call_out();

        foreach($get_tickets_for_call_outs as $tickets_for_call_out){
            $tickets_id = $tickets_for_call_out->id;
            $get_call_logs = $this->Admin_model->get_call_logs($date_now , $tickets_id);
            
            foreach($get_call_logs as $get_call_log){
                $status_log[] = $get_call_log->result;
            }
           if (in_array("SUCCESS" , $status_log) == true){
                //No notification activity done. 
            }else{
                //Count the number of attempts
                $number_of_tempts = count(array_keys($status_log , "FAILED"));
                if ($number_of_tempts == 1){
                    $message = "Second attempt need to perform...";
                }elseif ($number_of_tempts == 2){
                    $message = "Third attempt need to perform...";
                } elseif ($number_of_tempts == 3){
                    //Send SMS and Email to Seller after 3 failed call attempt per day  (if no success call attempt yet)
                    $message = "No success call attempt...";

                } else{
                    $message = "No call out attempts perform...";
                }
                //Email the assigned outbound assoc.
                $get_users_detail = $this->Admin_model->get_user_by_id($tickets_for_call_out->assigned_to);
                $return_email = $this->send_email($get_users_detail->email_address, 'For Call out', $message);
                
                if($return_email == true) {
                echo "<script type='text/javascript'>alert('SMS and Email notification will be sent to Unit Owner. Selected schedule will be temporarily blocked for 24 hours and will be fully blocked once received confirmation from Unit Owner by replying YES to SMS and email message or clicking the link provided or providing the OTP to Inbound Associate.');</script>";
                }else{
                echo "<script type='text/javascript'>alert('Failure to send the email notification.');</script>";
              }
            }
        }
    }

    //Emil
    //Unit Owner No reply within 24 hours, selected slot will automatically tag as open
    public function job_no_reply_within_24_slot_open(){
        $date_now = date("Y/m/d H:i:s");
        $get_no_rely = $this->Admin_model->chck_no_reply($date_now);

        if($get_no_rely){
            foreach($get_no_rely as $no_rep){
                $get_customer_detail = $this->Admin_model->get_buyers_by_customer_number($no_rep->customer_number);
                $time_diff = $this->Admin_model->get_time_diff($date_now, $no_rep->date_created);
                //chck if the date_created is more then 24 hrs if more than tag as Open the slot to tbl_turnover_schedule
                if($timediff > '24:00:00'){
                    //Update the link to expired
                    $this->Admin_model->update_used_link($no_rep->ticket_number);
                }else{
                    //Do nothing
                }
            }
        }
    }


    //For Sending email with confirmation of schedule
    public function job_24hrs_no_sched_confirmation(){
        date_default_timezone_set('Asia/Manila');
        $date_now = date("Y-m-d h:i:s");
        $exceeds = $this->Admin_model->get_all_sched_24hrs_no_sched();
        foreach($exceeds as $exceed){
            $time_exceed = $exceed->date_created;
            $customer_number = $exceed->customer_number;
            $get_customers = $this->Admin_model->get_customer_by_custnum($customer_number);
            $timediff = $this->Admin_model->get_time_diff($date , $time_exceed);
            if ($timediff >= '24:00:00'){
                foreach($get_customers as $get_customer){
                    $email_address = $get_customer->email_address;
                    $mobile_number = $get_customer->mobile_number;
                    if(!empty($email_address)){
                        $message = "Greetings from Federal Land, Inc.! Please be advised that we have yet to receive a reply from you within the allotted 24-hour response period, from the date of letter transmittal. Kindly contact us upon receipt of this message. Thank you.";
                        $send_email = $this->send_email($email_address, 'WeServe', $message);
                        $send_sms = $this->send_sms($mobile_number, $message);
                        if($send_email == true && $send_sms == true) { // && $return_sms == true
                            echo "<script type='text/javascript'>alert('Email and SMS notification will be sent to Unit Owner.');</script>";
                            $this->Admin_model->update_used_link($customer_number , $exceed->ticket_number);
                             //For Outbound tickets
                                $o_associates = array();
                                $outbounds = $this->Admin_model->get_all_outbound_associate();
                                    foreach ($outbounds as $outbound) {
                                        $o_associates[] = $outbound->user_id;
                                    }
                                $outbound_rand = array_rand($o_associates);
                                $outbound_assigned = $o_associates[$outbound_rand];
                                $insert_ticket = array(
                                    'ticket_number' => $exceed->ticket_number,
                                    'customer_number' => $customer_number,
                                    'created_by' => '0',
                                    'category' => 'Turnover',
                                    'subject' => 'For Callout did not confirm his/her schedule within 24 hrs (System Generated)',
                                    'assigned_to' => $outbound_assigned,
                                    'date_assigned' => date("Y/m/d H:i s")
                                    );

                                $insert_id = $this->Admin_model->add_ticket($insert_ticket);  
                            
                                if ($insert_id > 0){
                                       //Insert ticket status in db after assigning the tickets
                                        $ticket_status_data_insertion = array(
                                            array(
                                                    'ticket_number' => $exceed->ticket_number,
                                                    'status' => 0,
                                                    'assign_to' => '',
                                                    'user_section' => 'INBOUND_ASSOC',
                                                    'activity_status' => 0
                                                ),
                                                array(
                                                    'ticket_number' => $exceed->ticket_number,
                                                    'status' => 0,
                                                    'assign_to' => $outbound_assigned,
                                                    'user_section' => 'OUTBOUND_ASSOC',
                                                    'activity_status' => 0
                                                ),
                                                array(
                                                    'ticket_number' => $exceed->ticket_number,
                                                    'status' => 0,
                                                    'assign_to' => '',
                                                    'user_section' => 'HANDOVER_ASSOC',
                                                    'activity_status' => 0
                                                )
                                            );
                                            $this->db->insert_batch('tbl_ticket_status', $ticket_status_data_insertion);
                                    
                                    //Send Email to assigned ticket
                                    $outbond_details = $this->Admin_model->get_user_detail($outbound_assigned , '7');
                                    foreach($outbond_details as $outbond_detail){
                                        $email_address_outbond = $outbond_detail->email_address;
                                        $message = "Ticket was successfully assigned to you...";
                                        $send_email = $this->send_email($email_address_outbond, 'TICKET ASSIGNED', $message);
                                        if($send_email == true) { // && $return_sms == true
                                            echo "<script type='text/javascript'>alert('Email notification will be sent to Unit Owner. Selected schedule will be temporarily blocked for 24 hours and will be fully blocked once received confirmation from Unit Owner by replying YES to SMS and email message or clicking the link provided or providing the OTP to Inbound Associate.');</script>";
                                        } else {
                                            echo "<script type='text/javascript'>alert('Failure to send the email notification.');</script>";
                                        }
                                    }
                                }
                            }
                        }else{
                            echo "<script type='text/javascript'>alert('Failure to send the email notification.');</script>";
                        }
                    }   
                }
            }
        }
}


?>