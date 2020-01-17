<?php

    class ScheduleController extends CI_Controller{

        public function __contruct(){
            parent::__construct();
            $this->user_id = user('id');
            $this->role_id = user('role');
            $this->load->library('user_agent');
            $this->load->model('weserve_sap');
        }

        public function index($data = null) {
      
        }

        //For Checking if the setup on tbl_project_distance was made
        public function check_if_setup_was_made($project_code_from_sap){
            $check_id = $this->Admin_model->get_project_id_assoc($project_code_from_sap);
            if($check_id){
                $check_if_setup_was_made = $this->Admin_model->check_setup_disatnce($check_id->id);
                if($check_if_setup_was_made){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        //Get the distance for Inbound and Outbound
        public function get_user_preference($ched , $assigned_to , $project_distination){
            $distance = '';
            $schedule = $this->Admin_model->get_sched_of_outbond_assoc($ched , $assigned_to);
            if ($schedule){
                foreach($schedule as $data){
                    $project_code = strtok($data->ticket_number, '-') . '-' . strtok('-');
                    $project_id_of_assoc_sched_assign = $this->Admin_model->get_project_id_assoc($project_code);
                    $assoc_distination = $this->Admin_model->get_project_id_assoc($project_distination);
                    $distance_ids = $this->Admin_model->get_distance_project($project_id_of_assoc_sched_assign->id , $assoc_distination->id);  
                    if($distance_ids){
                        if ($distance_ids->distance > 10){
                            //exit();
                            return $distance = 'Not avail';
                        }else{
                            return $distance = 'Avail';
                        }  
                    }else{
                        return $distance = 'Not avail';
                    }
                }
            }else{
                return $distance = 'Avail';
            }
        } 

        //Get the distance for admin scheduling
        public function get_user_preference_admin($date_delay , $date_advance , $assigned_to , $project_distination){
            $distance = '';
            $schedules = $this->Admin_model->get_sched_of_hand_over_between($date_delay , $date_advance , $assigned_to);
            //$check_id = $this->Admin_model->get_project_id_assoc($project_distination);
            //$check_if_setup_was_made = $this->Admin_model->check_setup_disatnce($check_id->id);
            //var_dump($schedules , $assigned_to);exit();
            if ($schedules){
                foreach($schedules as $schedule){
                    $project_code = strtok($schedule->ticket_number, '-') . '-' . strtok('-');
                    $project_id_of_assoc_sched_assign = $this->Admin_model->get_project_id_assoc($project_code);
                    $assoc_distination = $this->Admin_model->get_project_id_assoc($project_distination);
                    $distance_ids = $this->Admin_model->get_distance_project($project_id_of_assoc_sched_assign->id , $assoc_distination->id);  
                    $sched = $schedule->schedule;
                    if($distance_ids){
                        if ($distance_ids->distance > 10){
                            return $distance = 'Not avail';
                        }else{
                            return $distance = 'Avail';
                        }
                    }else{
                        //No setup was made
                        return $distance = 'Not avail';
                    }
                }
            }else{
                return $distance = 'Avail';
            }
           
        }

        //For Inbound and Outbound scheduling
        public function onclickChange(){
            $sched = $this->input->get("dt");
            $date = strtotime($this->input->get('dt'));
            $distination = $this->input->get("project_owner");
            $project = $this->input->get("project");
            $time = $this->input->get("time");
            $ticket_id = $this->input->get("ticket_id");  
            $assign_user = array();
            $assign_user_id = array();
            $selected_user_id = array();
            $availability = array();
            $sched_chcker = array();
            $hand_assoc_users = array();
            $hand_over_assign = array();
            $assigned_to = '';
            $sched_user = '';
            $new_date = date("Y/m/d H:i:s", $date);

            $dt = new DateTime($new_date);
            $new_dt = $dt->setTime(intval($time), 00);
        
             //$tickets = $this->Admin_model->get_all_tickets();
             $ticket_count = $this->Admin_model->get_tickets_count();
             $ticket_number = $project .'-'. date("Y"). '-' .sprintf("%'.05d\n", $ticket_count->result +1);

            //Check if the user is Inbound or hand over
            if (user('position') == 6){
                $assign_user = $this->Admin_model->get_all_outbound_associate();
            }elseif (user('position') == 7){
                $assign_user = $this->Admin_model->get_hand_over_assoc();
            }
           
            foreach ($assign_user as $assign){
                $assign_user_id[] = $assign->id;
            }

            //select random user to assign
            $assigned_to = array_rand($assign_user_id);
            $selected_user_id = $assign_user_id[$assigned_to];
              
            $assign_user_sched = $this->Admin_model->get_sched_of_outbond_assoc($new_dt->format('Y-m-d') , $selected_user_id);
            
            $availability["assigned_to"] = $selected_user_id;
            
            $setup_bool = $this->check_if_setup_was_made($distination);
            
            if($setup_bool === true){
                //If has a schedule
                if (!empty($assign_user_sched)){
                    foreach($assign_user_sched as $user_sched){
                    $sched = $user_sched->schedule;
                    $sched_chcker[] = $user_sched->schedule;
                    $ticket_number = $user_sched->ticket_number;
                    $availability["assoc_assigned_project"] = strtok($ticket_number, '-');
                    $project_code = strtok($ticket_number, '-');
                    
                    $sched_date_where_clausehed = $new_dt->format('Y-m-d') . ' ' . '09:00:00';
                    
                    if (in_array($new_dt->format('Y-m-d H:i:s') , $sched_chcker)){
                        $availability['in_array_sched'] = $sched_chcker;
                        $availability['reserved'] = 'NOT AVAILABLE'; 
                        $availability['avail']= 'false';
                    }else{
                        $sched_date_where_clause_sched_9 = $new_dt->format('Y-m-d') . ' ' . '09:00:00';
                        $sched_date_where_clause_sched_11 = $new_dt->format('Y-m-d') . ' ' . '11:00:00';
                        $sched_date_where_clause_sched_14 = $new_dt->format('Y-m-d') . ' ' . '14:00:00';
                        $sched_date_where_clause_sched_16 = $new_dt->format('Y-m-d') . ' ' . '16:00:00';
                        if ($time == '9' ){
                            $distance_calculated = $this->get_user_preference($sched_date_where_clause_sched_9 , $selected_user_id , $distination);
                            if($distance_calculated === 'Not avail'){
                                $availability['avail'] = 'false';
                                $availability['reserved'] = 'NOT AVAILABLE';
                                $availability['More than 10KM in selected time is 9AM'] = '';
                            }else{
                                $availability['avail']= 'true';
                                $availability['reserved'] = '';
                                $availability['Less than 10KM in selected time is 9AM -> time selected is 9'] = '';
                            }
                        }else if ($time == '11'){
                            $distance_calculated = $this->get_user_preference($sched_date_where_clause_sched_9 , $selected_user_id , $distination);
                            if($distance_calculated === 'Not avail'){
                                $availability['distance'] = $distance_calculated;
                                $availability['avail'] = 'false';
                                $availability['reserved'] = 'NOT AVAILABLE';
                                $availability['More than 10KM in selected time is 11AM'] = '';
                            }else{
                                $availability['distance'] = $distance_calculated;
                                $availability['avail'] = 'true';
                                $availability['reserved'] = '';
                                $availability['Less than 10KM in selected time is 11AM'] = '';
                            }
                        }else if ($time == '14'){
                            $distance_calculated = $this->get_user_preference($sched_date_where_clause_sched_11 , $selected_user_id , $distination);
                            if($distance_calculated === 'Not avail'){
                                $availability['avail'] = 'false';
                                $availability['More than 10KM(Schedule is 9AM) in selected time is 14AM'] = '';   
                            }else{
                                $availability['avail'] = 'true';
                                $availability['reserved'] = '';
                            }
                        }else if ($time == '16'){
                            $distance_calculated = $this->get_user_preference($sched_date_where_clause_sched_9 , $selected_user_id , $distination);
                            $distance_calculated_11 = $this->get_user_preference($sched_date_where_clause_sched_11 , $selected_user_id , $distination);
                            $distance_calculated_14 = $this->get_user_preference($sched_date_where_clause_sched_14 , $selected_user_id , $distination);
                            
                            if ($distance_calculated_14 === 'Not avail'){
                                $availability['avail'] = 'false';
                                $availability['More than 10KM(Schedule is 2PM) in selected time is 4PM'] = ''; 
                            }else{
                                $availability['avail'] = 'true';
                                $availability['reserved'] = '';
                            }
                        }
                    }
                }
                }else{
                    $availability['reserved'] = ''; $availability['avail']= 'true';
                }
            }else{
                $availability['avail'] = 'false';
                $availability['reserved'] = '';
                $availability['setup'] = 'true';
                $availability['desc'] = 'No Set up was made';
            }
            
            $availability['project'] = $project;
            $availability['sched'] = $sched;
            $availability['time'] = $time;
            $availability['data'] = $new_dt->format('Y-m-d H:i:s');
            echo json_encode($availability);
        }

        //For Admin Scheduling
        public function onclickChangeAdmin(){
            $scheds = $this->input->get("dt");
            $date = strtotime($this->input->get('dt'));
            $distination = $this->input->get("project");
            $project = $this->input->get("project");
            $time = $this->input->get("time");
            $assigned_to = "";
            $ticket_id = $this->input->get("ticket_id");  
            $sequence = '1';

            $availability = array();
            $sched_chcker = array();

            $new_date = date("Y-m-d H:i:s", $date);

            $new_dt = date('Y-m-d ', $date) . ' ' . date("H:i" , strtotime($this->input->get("time")));
            
            //$tickets = $this->Admin_model->get_all_tickets();
            $ticket_count = $this->Admin_model->get_tickets_count();
            $ticket_number = $project .'-'. date("Y"). '-' .sprintf("%'.05d\n", $ticket_count->result +1);
            
            //Get all user with the position of Out bound
            $hand_assoc_users = array();
            $hand_over_assign = array();
            $hand = $this->Admin_model->get_all_handover_associate();
            foreach ($hand as $hands){
                $hand_assoc_users[] = $hands->user_id;
            }

            //$datas = $this->Admin_model->get_schedules_per_exact_datetime($new_dt);
            //$sequence = count($datas) + 1;
            
            //select ranhand_assoc_users_randdom assoc
            $assigned_to = array_rand($hand_assoc_users);
            $hand_over_assign = $hand_assoc_users[$assigned_to];
            
            //Plus and minus two hour of the selected time of user
            $base_time_advance = date('Y-m-d ', $date) . ' ' . date("00:H:i" , strtotime('+2 hour' , strtotime($this->input->get("time"))));
            $base_time_delay =  date('Y-m-d ', $date) . ' ' . date("00:H:i" , strtotime('-2 hour' , strtotime($this->input->get("time"))));
            //var_dump($base_time_advance);exit();
            $assigned_to = array_rand($hand_assoc_users);
            $hand_over_assign = $hand_assoc_users[$assigned_to];
            $hand_assoc_sched = $this->Admin_model->get_sched_of_hand_over_between($base_time_delay, $base_time_advance,$hand_over_assign);
            
            //var_dump($base_time_delay, $base_time_advance,$hand_over_assign);exit();
            $bool_distance = $this->get_user_preference_admin($base_time_delay , $base_time_advance , $hand_over_assign , $distination);
            
            $setup_bool = $this->check_if_setup_was_made($distination);

            if ($setup_bool === true){
                if(!empty($hand_assoc_sched)){
                    foreach($hand_assoc_sched as $hand_assoc_scheds){
                        $sched = $hand_assoc_scheds->schedule;
                        $sched_chcker[] = $hand_assoc_scheds->schedule;
                        $ticket_number = $hand_assoc_scheds->ticket_number;
                        $availability["assoc_assigned_project"] = strtok($ticket_number, '-');
                        $project_code = strtok($ticket_number, '-');
                        
                        if (in_array($new_dt , $sched_chcker)){
                            $availability['in_array_sched'] = $sched_chcker;
                            $availability['reserved'] = 'NOT AVAILABLE'; $availability['avail']= 'false';
                        }else{
                            //If the $bool_distance is true means the selected date time is available
                            if ($bool_distance === 'Avail'){
                                $availability['avail'] = 'true';
                                $availability['reserved'] = 'AVAILABLE';
                                $availability['desc'] = 'all of the value return true';
                            }else{
                                $availability['avail'] = 'false';
                                $availability['reserved'] = 'NOT AVAILABLE';
                                $availability['desc'] = 'One of the value return false';
                            }
                        }
                    }
                }else{
                    $availability['desc'] = 'No sched free to schedule'; 
                    $availability['avail']= 'true';
                    $availability['reserved'] = 'AVAILABLE';
                }
            }else{
                $availability['desc'] = 'No sched free to schedule'; 
                $availability['avail']= 'false';
                $availability['setup'] = 'true';
                $availability['reserved'] = 'No Setup was made';
            }
            $availability["assigned_to"] = $hand_over_assign;
            $availability['project'] = $project;
            $availability['sched'] = $scheds;
            $availability['time'] = $base_time_advance;
            $availability['data'] = $this->get_user_preference($base_time_delay , $base_time_advance , $hand_over_assign , $distination);
            echo json_encode($availability);
        }

        //Save the schedule when the selected schedule is Not Available
        public function add_schedule_logs() {
            $url_data = $this->input->post('data');
            parse_str($url_data , $details);
            $user_id = $details['logged_user'];
            $property = $details['property'];
            $customer_name = $this->input->post('customer_number');
            $date = strtotime($details['selected_dt']);
            $time = $details['time'];
            $project = $details['project'];
            $tickets = $this->Admin_model->get_all_tickets();
            $ticket_number = trim($property .'-'. date("Y"). '-' .sprintf("%'.05d\n", count($tickets)+1));
            $new_date = date("Y/m/d H:i:s", $date);
            $insert_id = '';
            $dt = new DateTime($new_date);
            $new_dt = $dt->setTime(intval($time), 00);
           
            // get all asscoiates withotu schedule specific datetime
            $associates = array();  
            $db_associates = array(); 
            $assign_to ='';
            $sequence = '';
            //count the queue line
            $date_to_save = $new_dt->format('Y-m-d ') . date("H:i" , strtotime($time));
            
            $queue_line = $this->Admin_model->count_line_queue($date_to_save, $this->input->post('assign_to'));
            
            $chck_dup = $this->Admin_model->chck_dup_in_line($customer_name , $date_to_save);
            var_dump($date_to_save);exit(); 
            if(empty($chck_dup)){
                $insert_data = array(
                    'customer_number' => $customer_name,
                    'ticket_number' => $ticket_number,
                    'schedule' => $date_to_save,
                    'assigned_to' => $this->input->post('assign_to'),
                    'sequence' => $queue_line->result + 1,
                    'status' => 0
                );
            $this->Admin_model->add_turnover_schedule($insert_data);
            }else{

            }
        }

        //Save the selected schedule
        public function add_schedule_available(){
            $user_id = $this->input->post('logged_user');
            $customer_number = $this->input->post('customer_number');
            $date = strtotime($this->input->post('selected_dt'));
            $time = $this->input->post('time');
            $project = $this->input->post('project');  
            $ticket_id = $this->input->post('ticket_id');
            $assign_to = $this->input->post('assign_to');
            $sequence = '1';
            $new_date = date("Y/m/d H:i:s", $date);
            $insert_id = '';
            $dt = new DateTime($new_date);
            $new_dt = $dt->setTime(intval($time), 00);
            $assign_to_outbound = '';
            $assign_to_inbound = '';
            $assign_to_hand_over = '';

            //$tickets = $this->Admin_model->get_all_tickets();
            $ticket_count = $this->Admin_model->get_tickets_count();
            $ticket_number = $project .'-'. date("Y"). '-' .sprintf("%'.05d\n", $ticket_count->result +1);
    
            //Emil update for reservation of ticket
            $chck_ticket = $this->Admin_model->check_ticket_number($ticket_number);
         
            $date_to_save = $new_dt->format('Y-m-d ') . date("H:i" , strtotime($time));
            
            //If the ticket has no sched
            if(count($chck_ticket) == 0){
                $insert_datas = array(
                'customer_number' => $customer_number,
                'ticket_number' => $ticket_number,
                'schedule' => $date_to_save,
                'sequence' => $sequence,
                'assigned_to' => $assign_to,
                'status' => 0);
                
                $this->Admin_model->add_turnover_schedule($insert_datas);
                
                //After the Add schedule insert ticket
                $ticket_details = array(
                "ticket_number" => $ticket_number,
                "created_by" => user('id'),
                "category" => 'Turnover' ,
                "subject" => 'For Schedule Confirmation',
                "assigned_to" => $assign_to
                );

                $this->Admin_model->add_ticket($ticket_details);
                 //Insert ticket status in db after assigning the tickets
                
                $position = $this->Admin_model->chck_usr_position($assign_to);

                if($position->position === '6'){
                    $assign_to_outbound = $assign_to;
                }else if($position->position === '7'){
                    $assign_to_inbound = $assign_to;
                }else if($position->position === '10'){
                    $assign_to_hand_over = $assign_to;
                }else if($position->position === '0'){
                    $assign_to_hand_over = $assign_to;
                }

                $ticket_status_data_insertion = array(
                array(
                    'ticket_number' => $ticket_number,
                    'status' => 0,
                    'assign_to' => $assign_to_inbound,
                    'user_section' => 'INBOUND_ASSOC',
                    'activity_status' => 1 
                ),
                array(
                    'ticket_number' => $ticket_number,
                    'status' => 0,
                    'assign_to' => $assign_to_outbound,
                    'user_section' => 'OUTBOUND_ASSOC',
                    'activity_status' => 0
                ),
                array(
                    'ticket_number' => $ticket_number,
                    'status' => 0,
                    'assign_to' => $assign_to_hand_over,
                    'user_section' => 'HANDOVER_ASSOC',
                    'activity_status' => 0
                  )
                );
            $this->db->insert_batch('tbl_ticket_status', $ticket_status_data_insertion);    
            }else{
                //If the ticket has sched update tickets old ticket and insert the new one 
                foreach($chck_ticket as $ticket_data){
                    $update_ticket = $this->Admin_model->update_ticket_for_resched($ticket_data->ticket_number);
                    //Notify the second in line.
                    $chck_in_line = $this->Admin_model->get_sequence_in_line($ticket_data->schedule);
                    
                     if($chck_in_line) {
                        $customer_number_line = $chck_in_line->customer_number;
                        $customer_number_lines = $this->Admin_model->get_customer_by_custnum($customer_number_line);
    
                        $message = "THE SLOT HAS BEEN OPEN...";
                        $return_email = $this->send_email($customer_number_lines->email_address, 'WESERVE - OPEN SLOT', $message);
                        $return_sms = $this->send_sms($detail->mobile_number, $message);
    
                        if($return_email == true && $return_sms == true) { // && $return_sms == true
                        echo "<script type='text/javascript'>alert('SMS and Email notification will be sent to Unit Owner. Selected schedule will be temporarily blocked for 24 hours and will be fully blocked once received confirmation from Unit Owner by replying YES to SMS and email message or clicking the link provided or providing the OTP to Inbound Associate.');</script>";
                        //redirect('inbound/schedule/', 'refresh');
                        }else {
                        echo "<script type='text/javascript'>alert('Failure to send the email notification.');</script>";
                        //redirect('inbound/schedule/', 'refresh');
                        }
                    }else{
                        //No Second in line 
                    }
                }
                $insert_data = array(
                    'customer_number' => $customer_number,
                    'ticket_number' => $ticket_number,
                    'schedule' => $new_dt->format('Y-m-d H:i:s'),
                    'sequence' => $sequence,
                    'assigned_to' => $assign_to,
                    'status' => 0
                );
                $insert_id = $this->Admin_model->add_turnover_schedule($insert_data);
                 //Insert ticket status in db after assigning the tickets
                 $ticket_status_data_insertion = array(
                    array(
                            'ticket_number' => $ticket_number,
                            'status' => 0,
                            'assign_to' => $assign_to,
                            'user_section' => 'INBOUND_ASSOC',
                            'activity_status' => 1
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
                            'assign_to' => '',
                            'user_section' => 'HANDOVER_ASSOC',
                            'activity_status' => 0
                        )
                    );
                    $this->db->insert_batch('tbl_ticket_status', $ticket_status_data_insertion);
                    
                //Send Email for Confirmation
                $this->send_email_for_confirmation();
                // ADD ACTIVITY
                $description = "The schedule has been re-scheduled to " . $new_dt->format('Y-m-d H:i:s') ;
                $act_data = array(
                    'ticket_id' => $insert_id,
                    'description' => $description,
                    'created_by' => user('id'),
                    'status' => 1
                );
                $this->Admin_model->add_activity_log($act_data);
            }
           
            // check if there's unit/parking in certain project qualified for turnover
            $detail = $this->Admin_model->get_customer_by_custnum($customer_number);
            $check_other_units = $this->Admin_model->get_customer_turnover_date_by_tin($detail->tin, $new_dt->format('Y-m-d H:i:s'), $detail->project, $customer_number);
    
            if($check_other_units) {
                foreach ($check_other_units as $check) {
                     $sequence = count($datas) + 1;
    
                     $insert_data = array(
                        'customer_number' => $check->customer_number,
                        'ticket_number' => $ticket_number,
                        'schedule' => $new_dt->format('Y-m-d H:i:s'),
                        'sequence' => $sequence,
                        'assigned_to' => $assign_to,
                        'status' => 0
                    );
    
                $insert_id = $this->Admin_model->add_turnover_schedule($insert_data);
    
                //Insert ticket status in db after assigning the tickets
                $ticket_status_data_insertion = array(
                    array(
                            'ticket_number' => $ticket_number,
                            'status' => 0,
                            'assign_to' => $assign_to,
                            'user_section' => 'INBOUND_ASSOC',
                            'activity_status' => 1
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
                            'assign_to' => '',
                            'user_section' => 'HANDOVER_ASSOC',
                            'activity_status' => 0
                        )
                    );
                    $this->db->insert_batch('tbl_ticket_status', $ticket_status_data_insertion);
                }
            }
    
            if($insert_id > 0) {
                //update ticket subject
                $this->Admin_model->update_ticket_subject_only($ticket_number,"TURNOVER", "FOR TURNOVER");
                // add to logs
                $description = "Inbound Associate selected a turnover schedule for Unit Owner";
                $tix = $this->Admin_model->get_ticket_by_customer_number($this->input->post('ticket_id'));
                
                foreach($tix as $t){
                    $act_data = array(
                        'ticket_id' => $t->ticket_id,
                        'description' => $description,
                        'created_by' => user('id'),
                        'status' => 0
                      );
                    $this->Admin_model->add_activity_log($act_data);    
                }
                    // create ticket - random assigning to outbound associate
                  $o_associates = array();
                    $outbounds = $this->Admin_model->get_all_outbound_associate();
                    foreach ($outbounds as $outbound) {
                        $o_associates[] = $outbound->id;
                    }
        
                    $outbound_rand = array_rand($o_associates);
                    $outbound_assigned = $o_associates[$outbound_rand];
                    
                    // EMAIL/ SMS TO handover
                    $user = $this->Admin_model->get_user_by_id($outbound_assigned);
                    $message = "THE TICKET NUMBER " .$ticket_number. " HAS BEEN ASSIGNED TO YOU. CLICK HERE FOR MORE INFO" .base_url('/outbound/ticket_details/'.$insert_id);
                    $return_email = $this->send_email($user->email_address, 'UNIT/PARKING TURNOVER', $message);
        
                    // EMAIL/SMS TO UNIT OWNER
                    $message = "TURNOVER SCHEDULE HAS BEEN BOOKED";
                    $return_email = $this->send_email($detail->email_address, 'UNIT TURNOVER SCHEDULE', $message);
                    $return_sms = $this->send_sms($detail->mobile_number, $message);
        
                 
                    $ticket_id_encrypt = $this->dec_enc($customer_number,'encrypt');
                    if($return_email == true) { // && $return_sms == true
                        echo "<script type='text/javascript'>alert('SMS and Email notification will be sent to Unit Owner. Selected schedule will be temporarily blocked for 24 hours and will be fully blocked once received confirmation from Unit Owner by replying YES to SMS and email message or clicking the link provided or providing the OTP to Inbound Associate.');</script>";
                        redirect('inbound/schedule/', 'refresh');
                    } else {
                        echo "<script type='text/javascript'>alert('Failure to send the email notification.');</script>";
                        redirect('inbound/schedule/', 'refresh');
                    }
            }

            //redirect to proper page after scheduling
            if(user('position') == 0 || user('position') <= 5 ){
                redirect('admin/schedule' , 'refresh');
            }elseif(user('position') == 6){
                redirect('inbound/my_dashboard/'.user('id'), 'refresh');
            }elseif(user('position') == 7){
                redirect('outbound/my_dashboard/'.user('id'), 'refresh');
            }
        }

        //Get the schedule and diplay to event
        public function get_schedule_event(){
            if($this->input->is_ajax_request()) {
                //$events = $this->Admin_model->get_turnover_schedule_by_project_id_by_position_and_project_code($this->input->get('project') , '10');
                $events = $this->Admin_model->get_schedule_event();
                $data_events = array();
                $time = array(); 
                foreach($events as $event) {
                    $data_events[] = array(
                         "id" => $event->id,
                         "title" => date("hA",strtotime($event->schedule)) . " With Schedule",
                         "start" => $event->schedule
                    );
                }
                echo json_encode(
                    array(
                        "events" => $data_events
                    )
                );
    
                 // exit();
            } else {
                //redirect('admin/my_dashboard/', 'refresh');
            }
        }
    }
?>