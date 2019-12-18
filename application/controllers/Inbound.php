<?php


class Inbound extends CI_Controller {
    
    public $user_id = '';
    public $role_id = '';

	public function __construct() {
        parent::__construct();
        $this->user_id = user('id');
        $this->role_id = user('role');
        $this->load->library('user_agent');
    }
	public function index($data = null) {
      
	}

   public function main() {
        $this->load->view('header');
        $this->load->view('inbound_associate/main');
        $this->load->view('footer');
   }

    public function my_dashboard() {
        $data = array(
            'tickets' => $this->Admin_model->get_tickets_by_assigned_to(user('id'))
        );
        $this->load->view('header');
        $this->load->view('inbound_associate/my_dashboard', $data);
        $this->load->view('footer');
   }

    public function dashboard() {

         $data = array(
            'units' => ''
        );
        

        $this->load->view('header');
        $this->load->view('inbound_associate/dashboard', $data);
        $this->load->view('footer');
   }

    public function schedule() {
        //$this->send_sms('09213283730','SAMPLE MESSAGE');

        $data = array(
            'projects' => $this->Admin_model->get_projects(),
            'units' => $this->Admin_model->get_units(),
            'customers' => $this->Admin_model->get_customers()
        );
        $this->load->view('header');
        $this->load->view('inbound_associate/schedule', $data);
   }

    public function schedule_specific() {

        $this->load->view('header');
        $this->load->view('inbound_associate/schedule_specific');
   }

    public function buyer_details() {
    
         $data = array(
            'customer' => $this->Admin_model->get_customer_transaction_by_customer_number($this->uri->segment(3)),
        );
        

        $this->load->view('header');
        $this->load->view('inbound_associate/buyer_info', $data);
        $this->load->view('footer');
   }

   public function ticket_details() {
          $data = array(
             'ticket_details' => $this->Admin_model->get_ticket_by_id($this->uri->segment(3))

        );
        $this->load->view('header');
        $this->load->view('inbound_associate/ticket_details', $data);
        $this->load->view('footer');
   }

     public function add_schedule() {

        $user_id = $this->input->post('logged_user');
        $customer_number = $this->input->post('customer_number');
        $date = strtotime($this->input->post('selected_dt'));
        $time = $this->input->post('schedule_time');
        $project = $this->input->post('project');  

        $new_date = date("Y/m/d H:i:s", $date);

        $dt = new DateTime($new_date);
        $new_dt = $dt->setTime(intval($time), 00);

        $tickets = $this->Admin_model->get_all_tickets();
        $ticket_number = trim($project .'-'. date("Y"). '-' .sprintf("%'.05d\n", count($tickets)+1));

        
        // get all asscoiates withotu schedule specific datetime
        $associates = array();  
        $db_associates = array(); 
        $assign_to ='';
        $sequence = 1;
        $users = $this->Admin_model->get_all_handover_associate();
        foreach ($users as $associate) {
            $associates[] = $associate->user_id;
        }

        $datas = $this->Admin_model->get_schedules_per_exact_datetime($new_dt->format('Y-m-d H:i:s'));
        $sequence = count($datas) + 1;
        foreach($datas as $data) :
            $db_associates[] = $data->assigned_to;
        endforeach;

        $diff = array_diff($associates, $db_associates);
        
        if($diff) {
            $key = array_rand($diff,1);
            $assign_to = $diff[$key];
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
            }
        }

       if($insert_id > 0) {
            // create ticket - random assigning to outbound associate
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
              'subject' => 'For Schedule Confirmation',
              'assigned_to' => $outbound_assigned,
              'date_assigned' => date("Y/m/d H:i s")
            );

            $this->Admin_model->add_ticket($insert_ticket);
            // EMAIL/ SMS TO OUTBOUND

            $message = "THE TICKET NUMBER " .$ticket_number. " HAS BEEN ASSIGNED TO YOU. CLICK HERE FOR MORE INFO" .base_url('/outbound/ticket_details/'.$insert_id);
            $return_email = $this->send_email($detail->email_address, 'UNIT TURNOVER SCHEDULE', $message);

            // EMAIL/SMS TO UNIT OWNER
            $message = "THIS IS A SAMPLE EMAIL NOTIFICATION SUBJECT TO CHANGE";
            $return_email = $this->send_email($detail->email_address, 'UNIT TURNOVER SCHEDULE', $message);
            $return_sms = $this->send_sms($detail->mobile_number, $message);
            if($return_email == true) { // && $return_sms == true
                echo "<script type='text/javascript'>alert('SMS and Email notification will be sent to Unit Owner. Selected schedule will be temporarily blocked for 24 hours and will be fully blocked once received confirmation from Unit Owner by replying YES to SMS and email message or clicking the link provided or providing the OTP to Inbound Associate.');</script>";
                redirect('inbound/schedule_specific/'.$customer_number, 'refresh');
            } else {
                echo "<script type='text/javascript'>alert('Failure to send the email notification.');</script>";
                redirect('inbound/schedule_specific/'.$customer_number, 'refresh');
            }
        }
    }
  

    public function schedule_date() {
        if($this->input->is_ajax_request()) {
            $sched = $this->input->get("dt");
            $project = $this->input->get("project");

            $time = array(); $associates = array();  $db_associates = array();
            $reserved1 = ''; $reserved2 = ''; $reserved3 = ''; $reserved4 = ''; $avail1='true'; $avail2='true'; $avail3='true'; $avail4='true';
            $default_time = array('9','11','14','16');
            $assign_to = '';
              //$scheds = $this->Admin_model->get_schedules_per_date($sched);
              $users = $this->Admin_model->get_all_handover_associate();
              foreach ($users as $associate) {
                $associates[] = $associate->user_id;
              }
              
              $scheds = $this->Admin_model->get_schedules_per_date($sched);
              if($scheds) {
                // if with schedule, get all reserved associate per date
                foreach($scheds as $sched) :
                 // $time[] = date("H",strtotime($sched->schedule));
                  $datas = $this->Admin_model->get_schedules_per_exact_datetime($sched->schedule);
                  foreach($datas as $data) :
                    $time[] = date("H",strtotime($data->schedule));
                    $db_associates[] = $data->assigned_to;

                  endforeach;
                  // findout the associate without schedule yet
                  $diff = array_diff($associates, $db_associates);

                  // disable input without available handover associate left
                  if(!$diff && in_array('9',$time)) { $reserved1 = 'NOT AVAILABLE'; $avail1= 'false'; } 
                  elseif(!$diff && in_array('11',$time)) { $reserved2 = 'NOT AVAILABLE'; $avail2='false';} 
                  elseif(!$diff && in_array('14',$time)) { $reserved3 = 'NOT AVAILABLE'; $avail3='false';} 
                  elseif(!$diff && in_array('16',$time)) { $reserved4 = 'NOT AVAILABLE'; $avail4='false';} 
                endforeach;

                
              } else {
                //if no sched, assign to random associate and set time to available
                //$assign_to = array_rand_value($associates,1);
                $time = array();
              }








            $data = array(
                'sched' => $sched,
                'avail1' => $avail1,
                'avail2' => $avail2,
                'avail3' => $avail3,
                'avail4' => $avail4,
                'reserved1' => $reserved1,
                'reserved2' => $reserved2,
                'reserved3' => $reserved3,
                'reserved4' => $reserved4,
                'assign_to' => $assign_to 
            );

            $this->load->view('inbound_associate/modals/schedule_modal', $data);
        } else {
            redirect('inbound/my_dashboard/', 'refresh');
        }
    }

    public function send_email($email, $subject, $message){

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "From:  <no-reply@weserve.com>"; 
        $subject = $subject;

        $result = mail($email,$subject,$message, $headers);
         if($result == true) {   
           return true;
         } else {
            return false;
         }  

    }

    public function send_sms($mobile, $message){

       //  $data_array = array(
       //      'mobile' => $mobile,
       //      'message' => $message
       //  );
       // $data = json_encode($data_array);

       //  $curl = curl_init();
       //  $url = "http://10.15.7.199/smsgateway/api/v1/sms/send";
       //  $request_headers = array();
       //  $request_headers[] = 'Content_Type: application/json';
       //  // Set some options - we are passing in a useragent too here
       //  curl_setopt_array($curl, array(
       //  CURLOPT_HTTPHEADER => $request_headers,
       //  CURLOPT_HTTPAUTH        => CURLAUTH_BASIC,
       //  CURLOPT_RETURNTRANSFER  => 1,
       //  CURLOPT_URL => $url,
       //  CURLOPT_POST =>  1,
       //  CURLOPT_POSTFIELDS => $data
                                                                                                                        
       //  ));
       //  // Send the request & save response to $resp
       //  $sXML = curl_exec($curl);
       //  var_dump($sXML); exit;
       //  $response["success"] = 1;
        
       //  if($oXML->E_RESPONSE == "OK") {
       //  }

    }


   public function dec_enc($string, $action) {
        $secret_key = 'my_simple_secret_key';
        $secret_iv = 'my_simple_secret_iv';
     
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
     
        if( $action == 'encrypt' ) {
            $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
        }
        else if( $action == 'decrypt' ){
            $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
        }
     
        return $output;
    }
  
    //Emil Added
     //For the Scheduling
     public function onclickChange(){

        $sched = $this->input->get("dt");
        $date = strtotime($this->input->get('dt'));
        $distination = $this->input->get("project_owner");
        $project = $this->input->get("project");
        $time = $this->input->get("time");
        $assigned_to = "";
        $ticket_id = $this->input->get("ticket_id");  
        $sequence = 1;

        $availability = array();
        $sched_chcker = array();

        $new_date = date("Y/m/d H:i:s", $date);

        $dt = new DateTime($new_date);
        $new_dt = $dt->setTime(intval($time), 00);

        $tickets = $this->Admin_model->get_all_tickets();
        $ticket_number = $project .'-'. date("Y"). '-' .sprintf("%'.05d\n", count($tickets)+1);

        //Get all user with the position of Out bound
        $hand_assoc_users = array();
        $hand_over_assign = array();
        $hand = $this->Admin_model->get_all_outbound_associate();
        foreach ($hand as $hands){
            $hand_assoc_users[] = $hands->id;
        }

        $datas = $this->Admin_model->get_schedules_per_exact_datetime($new_dt->format('Y-m-d H:i:s'));
        $sequence = count($datas) + 1;
        
        //select ranhand_assoc_users_randdom assoc
        $assigned_to = array_rand($hand_assoc_users);
        $hand_over_assign = $hand_assoc_users[$assigned_to];
        

        $datas = $this->Admin_model->get_schedules_per_exact_datetime($new_dt->format('Y-m-d H:i:s'));
        $sequence = count($datas) + 1;

        $assigned_to = array_rand($hand_assoc_users);
        $hand_over_assign = $hand_assoc_users[$assigned_to];
        $hand_assoc_sched = $this->Admin_model->get_sched_of_outbond_assoc($new_dt->format('Y-m-d') , $hand_over_assign);
        
        $datas = $this->Admin_model->get_schedules_per_exact_datetime($new_dt->format('Y-m-d H:i:s'));
        $sequence = count($datas) + 1;
        $availability['SAMPLE_2'] = $hand_assoc_sched;
        $availability['SAMPLE_3'] = $new_dt->format('Y-m-d H:i:s') . '->' . $hand_over_assign;
        $availability["assigned_to"] = $hand_over_assign;


       //If has a schedule
       if (!empty($hand_assoc_sched)){
        foreach($hand_assoc_sched as $hand_assoc_scheds){
            $sched = $hand_assoc_scheds->schedule;
            $sched_chcker[] = $hand_assoc_scheds->schedule;
            $ticket_number = $hand_assoc_scheds->ticket_number;
            $availability["assoc_assigned_project"] = strtok($ticket_number, '-');
            $project_code = strtok($ticket_number, '-');
            
            
            $sched_date_where_clausehed = $new_dt->format('Y-m-d') . ' ' . '09:00:00';
            
            if (in_array($new_dt->format('Y-m-d H:i:s') , $sched_chcker)){
                $availability['in_array_sched'] = $sched_chcker;
                $availability['reserved'] = 'NOT AVAILABLE'; $availability['avail']= 'false';
            }else{
                $sched_date_where_clause_sched_9 = $new_dt->format('Y-m-d') . ' ' . '09:00:00';
                $sched_date_where_clause_sched_11 = $new_dt->format('Y-m-d') . ' ' . '11:00:00';
                $sched_date_where_clause_sched_14 = $new_dt->format('Y-m-d') . ' ' . '14:00:00';
                $sched_date_where_clause_sched_16 = $new_dt->format('Y-m-d') . ' ' . '16:00:00';
                if ($time == '9' ){
                    $distance_calculated = $this->get_user_preference($sched_date_where_clause_sched_9 , $hand_over_assign , $distination);
                    if($distance_calculated > 10){
                        $availability['avail'] = 'false';
                        $availability['reserved'] = 'NOT AVAILABLE';
                        $availability['More than 10KM in selected time is 9AM'] = '';
                    }else{
                        $availability['avail']= 'true';
                        $availability['reserved'] = '';
                        $availability['Less than 10KM in selected time is 9AM -> time selected is 9'] = '';
                    }
                }else if ($time == '11'){
                    $distance_calculated = $this->get_user_preference($sched_date_where_clause_sched_9 , $hand_over_assign , $distination);
                    if($distance_calculated > 10){
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
                    $distance_calculated = $this->get_user_preference($sched_date_where_clause_sched_11 , $hand_over_assign , $distination);
                    if($distance_calculated > 10){
                        $availability['avail'] = 'false';
                        $availability['More than 10KM(Schedule is 9AM) in selected time is 14AM'] = '';   
                    }else{
                        $availability['avail'] = 'true';
                        $availability['reserved'] = '';
                    }
                }else if ($time == '16'){
                    $distance_calculated = $this->get_user_preference($sched_date_where_clause_sched_9 , $hand_over_assign , $distination);
                    $distance_calculated_11 = $this->get_user_preference($sched_date_where_clause_sched_11 , $hand_over_assign , $distination);
                    $distance_calculated_14 = $this->get_user_preference($sched_date_where_clause_sched_14 , $hand_over_assign , $distination);
                    
                    if ($distance_calculated_14 > 10){
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

        $availability['project'] = $project;
        $availability['sched'] = $sched;
        $availability['time'] = $time;
        $availability['data'] = $new_dt->format('Y-m-d H:i:s');
        echo json_encode($availability);
    }

    public function distance($project_code , $distination){
        //Get the Project id of the hand over assoc sched on the user selected date.
        $project_id_of_assoc_sched_assign = $this->Admin_model->get_project_id_assoc($project_code); 
        //Get the project if of unit owner. 
        $assoc_distination = $this->Admin_model->get_project_id_assoc($distination);
        //Get the distance base on the project id.
        $distance_project = $this->Admin_model->get_distance_project($project_id_of_assoc_sched_assign->id , $assoc_distination->id);
        
        return $distance_project->distance;
    }

    public function get_user_preference($ched , $assigned_to , $project_distination){
        $distance = '0';
        $schedule = $this->Admin_model->get_sched_of_outbond_assoc($ched , $assigned_to);
        if ($schedule !== '0'){
            foreach($schedule as $data){
                $ticket_number = $data->ticket_number;
                $project_code = strtok($ticket_number, '-');
                //Get the Project id of the hand over assoc sched on the user selected date.
                $project_id_of_assoc_sched_assign = $this->Admin_model->get_project_id_assoc($project_code);
                //Get the project if of unit owner. 
                $assoc_distination = $this->Admin_model->get_project_id_assoc($project_distination);
                //Get the distance base on the project id.
                $distance_project = $this->Admin_model->get_distance_project($project_id_of_assoc_sched_assign->id , $assoc_distination->id);   
                $distance = $distance_project->distance;
                return $distance;
            }
        }else{
            return $distance;
        }
        
    }   

    public function add_schedule_available(){
        $user_id = $this->input->post('logged_user');
        $customer_number = $this->input->post('customer_number');
        $date = strtotime($this->input->post('selected_dt'));
        $time = $this->input->post('schedule_time');
        $project = $this->input->post('project');  
        $ticket_id = $this->input->post('ticket_id');
        $assign_to = $this->input->post('assign_to');
        $sequence = 1;
        $new_date = date("Y/m/d H:i:s", $date);
        
        $dt = new DateTime($new_date);
        $new_dt = $dt->setTime(intval($time), 00);

        $datas = $this->Admin_model->get_schedules_per_exact_datetime($new_dt->format('Y-m-d H:i:s'));
        $sequence = count($datas) + 1;

        $tickets = $this->Admin_model->get_all_tickets();
        $ticket_number = $project .'-'. date("Y"). '-' .sprintf("%'.05d\n", count($tickets)+1);

        $insert_data = array(
            'customer_number' => $customer_number,
            'ticket_number' => $ticket_number,
            'schedule' => $new_dt->format('Y-m-d H:i:s'),
            'sequence' => $sequence,
            'assigned_to' => $assign_to,
            'status' => 0
        );

        $insert_id = $this->Admin_model->add_turnover_schedule($insert_data);
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
            }
        }

       if($insert_id > 0) {
            // create ticket - random assigning to outbound associate
          $o_associates = array();
            $outbounds = $this->Admin_model->get_all_outbound_associate();
            foreach ($outbounds as $outbound) {
                $o_associates[] = $outbound->id;
            }

            $outbound_rand = array_rand($o_associates);
            $outbound_assigned = $o_associates[$outbound_rand];
            
        /*     $insert_ticket = array(
              'ticket_number' => $ticket_number,
              'customer_number' => $customer_number,
              'created_by' => $user_id,
              'category' => 'Turnover',
              'subject' => 'For Schedule Confirmation',
              'assigned_to' => $outbound_assigned,
              'date_assigned' => date("Y/m/d H:i s")
            );

            $this->Admin_model->add_ticket($insert_ticket); */

            // add to logs
            // EMAIL/ SMS TO OUTBOUND

            $message = "THE TICKET NUMBER " .$ticket_number. " HAS BEEN ASSIGNED TO YOU. CLICK HERE FOR MORE INFO" .base_url('/outbound/ticket_details/'.$insert_id);
            $return_email = $this->send_email($detail->email_address, 'UNIT TURNOVER SCHEDULE', $message);

            // EMAIL/SMS TO UNIT OWNER
            $message = "THIS IS A SAMPLE EMAIL NOTIFICATION SUBJECT TO CHANGE";
            //$return_email = $this->send_email($detail->email_address, 'UNIT TURNOVER SCHEDULE', $message);
            //$return_sms = $this->send_sms($detail->mobile_number, $message);
            $ticket_id_encrypt = $this->dec_enc($customer_number,'encrypt');
            if($return_email == true) { // && $return_sms == true
                echo "<script type='text/javascript'>alert('SMS and Email notification will be sent to Unit Owner. Selected schedule will be temporarily blocked for 24 hours and will be fully blocked once received confirmation from Unit Owner by replying YES to SMS and email message or clicking the link provided or providing the OTP to Inbound Associate.');</script>";
                redirect('inbound/schedule/', 'refresh');
            } else {
                echo "<script type='text/javascript'>alert('Failure to send the email notification.');</script>";
                redirect('inbound/schedule/', 'refresh');
            }
        }
    }
}


