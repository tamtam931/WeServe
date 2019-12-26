<?php


class Admin extends CI_Controller {
    
    public $user_id = '';
    public $role_id = '';
    /*
        Added: Resource Variable for SAP custom Interface
        Author: Ben Zarmaynine E. Obra
        Date: 12-18-19
    */
    private $resource = '';
    private $unitResource = '';
    //End

	public function __construct() {
        parent::__construct();
        $this->user_id = user('id');
        $this->role_id = user('role');
        $this->load->library('user_agent');
        $this->load->model('weserve_sap');
        $this->load->model('weserve_sap_project');
        $this->load->model('weserve_sap_floor');
        $this->load->model('weserve_sap_customer');
    }
	public function index($data = null) {
      
	}

   public function main() {
        $this->load->view('header');
        $this->load->view('admin/main');
        $this->load->view('footer');
   }

    public function my_dashboard() {
        $data = array(
            'tickets' => $this->Admin_model->get_all_tickets()
        );
        $this->load->view('header');
        $this->load->view('admin/my_dashboard', $data);
        $this->load->view('footer');
   }

    public function dashboard() {

        if ($this->input->is_ajax_request()) {
            
            if ($id = $this->input->get('project')) {

                //Get selected Project saved on DB
                $data['project'] = $this->weserve_sap_project->get($id);
                
                //Check if data successfully fetched to store on variable $project
                if ($project = $data['project']) {

                    if (isset($project['project_code_sap']) && isset($project['company_code'])) {

                        /*
                            declare uri string for initialization of SAP Interface using CompanyProjectResource function
                        */
                        $data['sub_resource_units'] = $this->weserve_sap->CompanyProjectResource('/Units',[

                            'company_code' => $project['company_code'],
                            'project_code' => $project['project_code_sap']

                        ]);

                        $data['sub_resource_salesOrder'] = $this->weserve_sap->CompanyProjectResource('/SalesOrders',[

                            'company_code' => $project['company_code'],
                            'project_code' => $project['project_code_sap']

                        ]);
                        //End

                        //Get All floors saved on DB
                        $data['floors'] = $this->weserve_sap_floor->where('project_code',$project['project_code_sap'])->where('company_code',$project['company_code'])->get_all();


                    } else {

                        $data['key'] = 'error';
                    }
                   
                }
                
            } else {

                $data['key'] = 'false';
            }

            $this->load->view('admin/dashboard_table',$data);

        } else {

            //get all projects saved on DB
            $data['projects'] = $this->weserve_sap_project->as_dropdown('project')->get_all();
            

            $this->load->view('header');
            $this->load->view('admin/dashboard', $data);
            $this->load->view('footer');            
        }

   }

   /*
        Added: controllers for function `dashboard()`
        Author: Ben Zarmaynine E. Obra
        Date: 12-18-19

   */

    public function dashboard_show(){

        if ($this->input->is_ajax_request()) {
            
            $sub_resource = array(
                'company_code' => $this->uri->segment(4),
                'project_code' => $this->uri->segment(6),
                'unit_number' => $this->uri->segment(8)
            );

            $this->resource = 'Companies/'.$sub_resource['company_code'].'/Towers/'.$sub_resource['project_code'].'/Units/'.$sub_resource['unit_number'].'/Quotation';

            $get_quotations = $this->weserve_sap->all($this->resource,[
                'type' => 'GET',
                'params' => 'active',
                'value' => 'true'
            ]);

            $data['quotation'] = $get_quotations;
            $data['count_quotation'] = count($get_quotations);
            $data['button_val'] = $sub_resource['unit_number'];

            $this->load->view('admin/dashboard_quotation',$data);

        } else {


        }        
    }

    //End   

    public function schedule() {
         $data = array(
            'projects' => $this->Admin_model->get_projects(),
            'units' => $this->Admin_model->get_units(),
            'customers' => $this->Admin_model->get_customers()
        );
        $this->load->view('header');
        $this->load->view('admin/schedule', $data);
   }

   public function customer_file() {

         $data = array(
            'customers' => $this->Admin_model->get_customer_transaction(),
            'projects' => $this->Admin_model->get_projects()
        );
        

        $this->load->view('header');
        $this->load->view('admin/customer_file', $data);
        $this->load->view('footer');
   }

   public function buyer_details() {
    
         $data = array(
            'customer' => $this->Admin_model->get_customer_transaction_by_customer_number($this->uri->segment(3)),
        );
        

        $this->load->view('header');
        $this->load->view('admin/buyer_info', $data);
        $this->load->view('footer');
   }

    public function administration() {
        $data = array(
            'positions' => $this->Admin_model->get_positions(),
            'users' => $this->Admin_model->get_users(),
            'unit_types' => $this->Admin_model->get_unit_types_in_checking_areas(),
            'checking_areas' => $this->Admin_model->get_checking_areas(),
            'checking_lists' => $this->Admin_model->get_checking_areas_list(),
            'sections' => $this->Admin_model->get_all_sections(),
            'roles' => $this->Admin_model->get_all_roles(),
            'projects' => $this->Admin_model->get_projects()
        );
        $this->load->view('header');
        $this->load->view('admin/administration', $data);
        $this->load->view('footer');
   }

   public function ticket_details() {
          $data = array(
             'ticket_details' => $this->Admin_model->get_ticket_by_id($this->uri->segment(3))

        );
        $this->load->view('header');
        $this->load->view('admin/ticket_details', $data);
        $this->load->view('footer');
   }

   public function turnover_process() {
          $data = array(
            'ticket_details' => $this->Admin_model->get_ticket_by_id($this->uri->segment(3))
        );
        $this->load->view('header');
        $this->load->view('admin/turnover_process', $data);
        $this->load->view('footer');
   }

    public function add_user() {

        $user_id = $this->input->post('user_id');
        $position_data = $this->Admin_model->get_positions_by_id($this->input->post('position'));

        $insert_data = array(
            'firstname' => $this->input->post('firstname'),
            'middlename' => $this->input->post('middlename'),
            'lastname' => $this->input->post('lastname'),
            'position' => $position_data->id,
            'username' => $this->input->post('username'),
            'password' => $this->dec_enc(trim($this->input->post('password')), 'encrypt'),
            'email_address' => $this->input->post('email_address'),
            'created_by' => $user_id
        );
        $last_id = $this->Admin_model->add_user($insert_data);

        if (isset($last_id)) {
            echo "<script type='text/javascript'>alert('New user has been successfully added.');</script>";
            redirect('admin/administration/', 'refresh');
        }
    
     
   }

    public function update_user() {

        $user_id = $this->input->post('user_id');
        $edit_user_id = $this->input->post('edit_user_id');

        $firstname = $this->input->post('firstname');
        $middlename = $this->input->post('middlename');
        $lastname = $this->input->post('lastname');
        $status = $this->input->post('status');

        $update_data = array(
            'firstname' => $firstname,
            'middlename' => $middlename,
            'lastname' => $lastname,
            'status' => $status
        );
        $last_id = $this->Admin_model->update_user($edit_user_id, $firstname, $middlename, $lastname, $status);

        if (isset($last_id)) {
            echo "<script type='text/javascript'>alert('Changes made has been successfully saved.');</script>";
            redirect('admin/administration/', 'refresh');
        }


    
     
   }

   public function delete_user(){
        $user_id = $this->input->post('the_user_id');

        // CHECK IF WITH CURRENT TRANSACTION

        $last_id = $this->Admin_model->deactivate_user($user_id);
        if($last_id) {
            echo "<script type='text/javascript'>alert('Selected account has been successfully deleted.');</script>";
            redirect('admin/administration/', 'refresh');
        }
   }

    public function check_username(){
        $username = $this->input->get('checker');
        $firstname = $this->input->get('firstname');
        $middlename = $this->input->get('middlename');
        $lastname = $this->input->get('lastname');
        $checker = $this->Admin_model->get_user_by_username($username);
        if($checker) {
             for($i=2; $i <= strlen($firstname); $i++) {
                $temp_fname = strtolower(substr($firstname, 0, $i)); 
                $temp_username = $temp_fname . substr($middlename, 0, 1) . $lastname;

                $checker = $this->Admin_model->get_user_by_username($temp_username);
                if(!$checker) {
                    echo strtolower($temp_username);exit;
                }
            }

        } else {
            echo strtolower($username); //exit;
        }

        
    }

    public function change_password() {

        $user_id = $this->input->post('user_id');

        $get_data = $this->Admin_model->get_user_by_id($user_id);

        $currentpassword = $this->input->post('current_password');
        $newpassword = $this->input->post('new_password');
        $retypepassword = $this->input->post('retype_password');

        if($newpassword == $retypepassword) {
            if($get_data->password == $this->dec_enc($currentpassword, 'encrypt')) {    
                $last_id = $this->Admin_model->update_user_password($user_id, $this->dec_enc($newpassword, 'encrypt'));
                $insert_data = array(
                    'user_id' => $user_id,
                    'user_password' => $this->dec_enc($newpassword, 'encrypt')
                );
                $this->Admin_model->add_user_password_log($insert_data);
                echo "<script type='text/javascript'>alert('Password has been successfully updated.');</script>";
                redirect('admin/administration/#btn_pwrd', 'refresh');
            } else {
                echo "<script type='text/javascript'>alert('The current password you entered is invalid. Please try again.');</script>";
                redirect('admin/administration/#btn_pwrd', 'refresh');
            }
        } else {
            echo "<script type='text/javascript'>alert('The new password you entered does not match. Please try again.');</script>";
            redirect('admin/administration/#btn_pwrd', 'refresh');
        }
       


    }


    public function change_password_required() {

        $user_id = $this->input->post('logged_user');

        $get_data = $this->Admin_model->get_user_by_id($user_id);
        $newpassword = $this->input->post('new_password');
        $retypepassword = $this->input->post('retype_password');

        if($newpassword == $retypepassword) {
            $last_id = $this->Admin_model->update_user_password($user_id, $this->dec_enc($newpassword, 'encrypt'));
            $insert_data = array(
                'user_id' => $user_id,
                'user_password' => $this->dec_enc($newpassword, 'encrypt')
            );
            $this->Admin_model->add_user_password_log($insert_data);
            echo "<script type='text/javascript'>alert('Password has been successfully updated.');</script>";
            redirect('admin/my_dashboard/', 'refresh');

        } else {
            echo "<script type='text/javascript'>alert('The new password you entered does not match. Please try again.');</script>";
            redirect('admin/my_dashboard/', 'refresh');
        }
       


    }

    public function add_schedule() {

        $user_id = $this->input->post('logged_user');
        $customer_number = $this->input->post('customer_number');
        $date = strtotime($this->input->post('selected_dt'));
        $time = $this->input->post('schedule_time');


        $new_date = date("Y/m/d H:i:s", $date);

        $dt = new DateTime($new_date);
        $new_dt = $dt->setTime(intval($time), 00);
        
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
            'schedule' => $new_dt->format('Y-m-d H:i:s'),
            'sequence' => $sequence,
            'assigned_to' => $assign_to,
            'status' => 0
        );

        $insert_id = $this->Admin_model->add_turnover_schedule($insert_data);
        // check if there's unit/parking in certain project qualified for turnover
        $detail = $this->Admin_model->get_customer_by_custnum($customer_number);
        // $check_other_units = $this->Admin_model->get_customer_turnover_date_by_tin($detail->tin, $new_dt->format('Y-m-d H:i:s'), $detail->project, $customer_number);

        // if($check_other_units) {
        //     foreach ($check_other_units as $check) {
        //          $sequence = count($datas) + 1;

        //          $insert_data = array(
        //             'customer_number' => $check->customer_number,
        //             'schedule' => $new_dt->format('Y-m-d H:i:s'),
        //             'sequence' => $sequence,
        //             'assigned_to' => $assign_to,
        //             'status' => 0
        //         );

        //         $insert_id = $this->Admin_model->add_turnover_schedule($insert_data);
        //     }
        // }

       if($insert_id > 0) {

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
  


    public function add_schedule_logs() {
        $url_data = $this->input->post('data');
        parse_str($url_data);

        $user_id = $logged_user;
        $property = $property;
        $unit_number = $unit_number;
        $parking = $parking;
        $customer_name = $customer_name;
        $date = strtotime($selected_dt);
        $time = $schedule_time;


        $new_date = date("Y/m/d H:i:s", $date);
        $dt = new DateTime($new_date);
        $new_dt = $dt->setTime(intval($time), 00);

        // get all asscoiates withotu schedule specific datetime
        $associates = array();  
        $db_associates = array(); 
        $assign_to ='';
        $sequence = 1;
 
        // $users = $this->Admin_model->get_all_handover_associate();
        // foreach ($users as $associate) {
        //     $associates[] = $associate->user_id;
        // }

        // since this is a queue, assigning to associate will be zero - will be assign to associate upon resched
        $datas = $this->Admin_model->get_schedules_per_exact_datetime($new_dt->format('Y-m-d H:i:s'));
        $sequence = count($datas) + 1;
        // foreach($datas as $data) :
        //     $db_associates[] = $data->assigned_to;
        // endforeach;

        // $diff = array_diff($associates, $db_associates);
        
        // if($diff) {
        //     $key = array_rand($diff,1);
        //     $assign_to = $diff[$key];
        // }

        $insert_data = array(
            'property' =>  $property,
            'unit_number' => $unit_number,
            'parking_number' => $parking,
            'customer_name' => $customer_name,
            'schedule' => $new_dt->format('Y-m-d H:i:s'),
            'assigned_to' => 0,
            'sequence' => $sequence,
            'status' => 1
        );

        $this->Admin_model->add_turnover_schedule($insert_data);

    }


    public function get_schedule()
    {
        if($this->input->is_ajax_request()) {
            $events = $this->Admin_model->get_turnover_schedule_by_project_id($this->input->get('project'));

            $data_events = array();
            $time = array(); 
            foreach($events as $event) {
                // $dt = date("YYYY-MM-DD",strtotime($sched->schedule);
                // $time[] = date("YYYY-MM-DD H",strtotime($sched->schedule));
                // $default_time = array($dt.'9',$dt.'11',$dt.'14', $dt.'16');

                $data_events[] = array(
                     "id" => $event->id,
                     "title" => date("hA",strtotime($event->schedule)) . " With Schedule",
                     "start" => $event->schedule
                     // "customer_name" => $event->customer_name,
                     // "property" => $event->property,
                     // "unit_number" => $event->unit_number,
                     // "parking_number" => $event->parking_number
                );
            }


            echo json_encode(
                array(
                    "events" => $data_events
                )
            );

             // exit();
        } else {
            redirect('admin/my_dashboard/', 'refresh');
        }
    }

    public function schedule_datetime() {

        if($this->input->is_ajax_request()) {
            echo $this->input->get("dt");
        } else {
            redirect('admin/my_dashboard/', 'refresh');
        }
       

    }

    public function checking_areas_part() {

        if($this->input->is_ajax_request()) {
            $data = array(
                'data' => $this->input->get("id"),
                'project' => $this->input->get("project")
            );
            $this->load->view('admin/part/administration_areas_part', $data);
        } else {
            redirect('admin/my_dashboard/', 'refresh');
        }
       

    }


    public function schedule_date() {
        if($this->input->is_ajax_request()) {
            $data = array(
                'sched' => $this->input->get("dt")
            );
            $this->load->view('admin/modals/schedule_modal', $data);
        } else {
            redirect('admin/my_dashboard/', 'refresh');
        }
    }

    public function add_checking_area() {
        $project_id = $this->input->post('project_id');
        $type_id = $this->input->post('unit_id');
        $area = $this->input->post('area');
        $required_check = $this->input->post('required_check');

        $insert_data = array(
            'unit_type' =>  $type_id,
            'project' =>  $project_id,
            'area_id' => $area,
            'required' => $required_check
        );

        $insert_id = $this->Admin_model->add_checking_area($insert_data);

        if($insert_id > 0) {
            echo "<script type='text/javascript'>alert('Areas for checking has been successfully added.');</script>";
            redirect('admin/administration/'.$type_id.'/'.$project_id.'/#btn_unit', 'refresh');
        }


    }

     public function edit_checking_area() {
        $type_id = $this->input->post('edit_type_id');
        $edit_area_id = $this->input->post('edit_area_id');
        $area = $this->input->post('area');
        $required_check = $this->input->post('required_check');


        $update = $this->Admin_model->update_checking_area($edit_area_id, $area, $required_check);

        if($update) {
            echo "<script type='text/javascript'>alert('Area for checking has been successfully updated.');</script>";
            redirect('admin/administration/'.$type_id.'/#btn_unit', 'refresh');
        }
    }

    public function delete_checking_area(){
        $area_id = $this->uri->segment(4);
        $type_id = $this->uri->segment(3);
        $last_id = $this->Admin_model->delete_checking_area($area_id);
        if($last_id) {
            echo "<script type='text/javascript'>alert('Selected Area for Checking has been successfully deleted.');</script>";
            redirect('admin/administration/'.$type_id.'/#btn_unit', 'refresh');
        }
   }

    public function get_value_edit_area() {
        if($this->input->is_ajax_request()) {
            $data = array(
                'checking_area_id' => $this->input->get("id")
            );
            $this->load->view('admin/part/edit_areas_part', $data);
        } else {
            redirect('admin/my_dashboard/', 'refresh');
        }
    }

    public function upload_image() {
        if($this->input->is_ajax_request()) {
            $description = $this->input->post('description');
            $ticket_num = $this->input->post('ticket_num');
            $filename  = $ticket_num . '-' .$description;
            $image = $this->do_upload( 'userfile', 'jpg|jpeg|png', './uploads/', $filename);

            if(isset($image)) {
              $photo = $image['upload_data']['file_name'];
              $insert_data = array(
                'ticket_number' => $ticket_num,
                'image_description' => $description,
                'image_path' => $photo
              );
              $insert_id = $this->Admin_model->add_ticket_images($insert_data);
              return $insert_id;
            } 

        }
    
    }

    public function add_turnover_process() {
        $count = $this->input->post('count_inputs');
        $ticket_number = $this->input->post('ticket');
        $unit_type = $this->input->post('unit_type_id');

        $checklist_checker = $this->Admin_model->get_ticket_checklist_by_ticketid($ticket_number);
        if($checklist_checker) {
            // delete if existing checklist record
            $this->Admin_model->delete_ticket_checklist($ticket_number);
        }

        for ($i = 0; $i < $count; $i++) {
            $strarea = 'area'. $i;
            $strobservation = 'observation'. $i;

            $area = $this->input->post($strarea);
            $observation = $this->input->post($strobservation);

           if($area != NULL) {
                $insert_data = array(
                'ticket_number' => $ticket_number,
                'area_for_checking' => $area,
                'observation' => $observation
               );
               $insert_id = $this->Admin_model->add_ticket_checklist($insert_data);
           }
           
        }

        if($insert_id > 0) {
            echo "<script type='text/javascript'>alert('Turnover Checklist has been successfully saved.');</script>";
            redirect('admin/turnover_process/'.$unit_type, 'refresh');
        }


    }

    public function do_upload( $field_name = null, $type = null, $path = null, $filename = null ) {

       $config['upload_path'] = $path;
       $config['allowed_types'] = $type;
       $config['max_size']    = 0;
       $config['file_name'] = $filename; //preg_replace('/[^A-Za-z0-9]/', "", $filename);

       $this->load->library('upload', $config);
       $this->upload->initialize($config);
       if ( ! $this->upload->do_upload($field_name)) {
           $data['error_msg'] = $this->upload->display_errors();
       }
       else {
           $data = array('upload_data' => $this->upload->data());
       }
       return $data;

   }

   public function get_images_per_category() {

        if($this->input->is_ajax_request()) {
            $data = array(
                'datas' => $this->Admin_model->get_ticket_images_by_category($this->input->get("ticket_num"),$this->input->get("category"))
            );
            $this->load->view('admin/part/turnover_process/1', $data);
        } else {
            redirect('admin/my_dashboard/', 'refresh');
        }
       

    }

    // public function get_units_by_project() {
    //     $project = $this->input->post('project');
    //     $tower = $this->input->post('tower');

    //     $units = $this->Admin_model->get_all_unit_floors_by_project_tower($project, $tower);
        
    //     redirect('admin/dashboard/',$units);
    //     // $this->load->view('header');
    //     // $this->load->view('admin/dashboard', $data);
    //     // $this->load->view('footer');
    // }

    public function add_checking_area_list() {

        $insert_data = array(
            'area_description' => $this->input->post('area')
        );
        $last_id = $this->Admin_model->add_checking_area_list($insert_data);

        if (isset($last_id)) {
            echo "<script type='text/javascript'>alert('New Area has been successfully added.');</script>";
            redirect('admin/administration/#btn_list', 'refresh');
        }
    
     
    }

    public function get_value_edit_area_list() {
        if($this->input->is_ajax_request()) {
            $data = array(
                'checking_area_id' => $this->input->get("id")
            );
            $this->load->view('admin/part/edit_area_list_part', $data);
        } else {
            redirect('admin/my_dashboard/', 'refresh');
        }
    }

    public function edit_checking_area_list() {
        $edit_area_id = $this->input->post('edit_area_id');
        $area = $this->input->post('area');


        $update = $this->Admin_model->update_checking_area_list($edit_area_id, $area);

        if($update) {
            echo "<script type='text/javascript'>alert('Area for checking has been successfully updated.');</script>";
            redirect('admin/administration/#btn_list', 'refresh');
        }
    }


    public function delete_checking_area_list(){
        $area_id = $this->uri->segment(3);
        $last_id = $this->Admin_model->delete_checking_area_list($area_id);
        if($last_id) {
            echo "<script type='text/javascript'>alert('Selected Area for Checking has been successfully deleted.');</script>";
            redirect('admin/administration/#btn_list', 'refresh');
        }
   }


   public function add_position() {
        $section = $this->input->post('section');
        $role = $this->input->post('role');

        $section_data = $this->Admin_model->get_section_by_id($section);
        $role_data = $this->Admin_model->get_role_by_id($role);

        $insert_data = array(
            'position_desc' => $section_data->section_desc .' '. $role_data->role_desc,
            'section_id' => $section,
            'role_id' => $role
        );
        $last_id = $this->Admin_model->add_position($insert_data);

        if (isset($last_id)) {
            echo "<script type='text/javascript'>alert('New Position has been successfully added.');</script>";
            redirect('admin/administration/#btn_list', 'refresh');
        }
    
     
    }


    public function delete_position(){
        $position_id = $this->uri->segment(3);
        $last_id = $this->Admin_model->delete_position($position_id);
        if($last_id) {
            echo "<script type='text/javascript'>alert('Selected Position has been successfully deleted.');</script>";
            redirect('admin/administration/#btn_list', 'refresh');
        }
   }

   public function get_value_edit_position() {
        if($this->input->is_ajax_request()) {
            $data = array(
                'position' => $this->input->get("id")
            );
            $this->load->view('admin/part/edit_position_part', $data);
        } else {
            redirect('admin/my_dashboard/', 'refresh');
        }
    }

    public function edit_position() {
        $position_id = $this->input->post('position_id');
        $section = $this->input->post('section');
        $role = $this->input->post('role');
        
        $section_data = $this->Admin_model->get_section_by_id($section);
        $role_data = $this->Admin_model->get_role_by_id($role);
        $position_desc = $section_data->section_desc . ' ' . $role_data->role_desc;

        $update = $this->Admin_model->update_position($position_id, $section, $role, $position_desc);

        if($update) {
            echo "<script type='text/javascript'>alert('Area for checking has been successfully updated.');</script>";
            redirect('admin/administration/#btn_list', 'refresh');
        }
    }

    public function get_project_distance() {

        if($this->input->is_ajax_request()) {
            $data = array(
                'data' => $this->input->get("id")
            );
            $this->load->view('admin/part/administration_project_distance_part', $data);
        } else {
            redirect('admin/my_dashboard/', 'refresh');
        }
       

    }


    public function get_value_edit_distance() {
        if($this->input->is_ajax_request()) {
            $data = array(
                'distance_id' => $this->input->get("id")
            );
            $this->load->view('admin/part/edit_distance_part', $data);
        } else {
            redirect('admin/my_dashboard/', 'refresh');
        }
    }

    public function add_project_distance() {
        $project_id = $this->input->post('project_id');
        $from_project = $this->input->post('project');
        $to_project = $this->input->post('to_project');
        $distance = $this->input->post('distance');

        // check duplicates before insert
        $check = $this->Admin_model->get_project_distance_by_to_from($from_project, $to_project);
        if($check != NULL) {
            $insert_data = array(
                'project_from' => $project_id,
                'project_to' => $to_project,
                'distance' => $distance
            );
            $last_id = $this->Admin_model->add_project_distance($insert_data);

            if (isset($last_id)) {
                echo "<script type='text/javascript'>alert('New Distance has been successfully added.');</script>";
                redirect('admin/administration/'.$project_id.'/#btn_turnover', 'refresh');
            }
        } else {
            echo "<script type='text/javascript'>alert('Project Distance already exists. Please try again.');</script>";
            redirect('admin/administration/'.$project_id.'/#btn_turnover', 'refresh');
        }   
        
    
     
    }

    public function edit_project_distance() {
        $distance_id = $this->input->post('distance_id');
        $from_project = $this->input->post('project_fr');
        $to_project = $this->input->post('to_project');
        $distance = $this->input->post('distance');

        $last_id = $this->Admin_model->update_project_distance($distance_id, $distance);

        if (isset($last_id)) {
            echo "<script type='text/javascript'>alert('Selected Project Distance has been successfully updated.');</script>";
            redirect('admin/administration/'.$from_project.'/#btn_turnover', 'refresh');
        }
    
    }

    public function delete_project_distance(){
        $distance_id = $this->uri->segment(3);
        $last_id = $this->Admin_model->delete_project_distance($distance_id);
        if($last_id) {
            echo "<script type='text/javascript'>alert('Selected Project Distance has been successfully deleted.');</script>";
            redirect('admin/administration/#btn_turnover', 'refresh');
        }
   }

    public function get_buyer_details() {

        if($this->input->is_ajax_request()) {
            $data = array(
                'customer_number' => $this->input->get("customer_number")
            );
            $this->load->view('admin/part/properties_details_part', $data);
        } else {
            redirect('admin/my_dashboard/', 'refresh');
        }
       

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

     public function send_email($email, $subject, $message){

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "From:  <no-reply@weserve.com>"; 

        $result = mail($email,$subject,$message, $headers);
         if($result == true) {   
           return true;
         } else {
            return false;
         }  

    }

    public function send_sms($mobile, $message){


    }

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
            $accepted_qcd = $data->accepted_qcd;
            $accepted_handover = $data->accepted_handover;
            $qualified_turnover = $data->qualified_turnover_date;
            
            if(!$accepted_qcd == 0){
                if (!$accepted_handover == 0){
                    if ($qualified_turnover == 0){
                        //Update the qualified turnover fields 
                        $update_qualified_turnover = $this->Admin_model->update_qualified_turnover_date(date("Y/m/d H:i:s") , $customer_number);
                        $update_unit_status = $this->Admin_model->update_status_unit($project , $runitid);
                    }else{
                        //Do Nothing
                    }
                }
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
                    echo "<script>alert('Has Schecdule');</script>";
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
                    
                    //Send Email to default_user for scheduling 
                    if ($insert_id > 0){
                       
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
                            $this->Admin_model->add_ticket($insert_ticket); 
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

            if (!$approved_turn_over == 0){
                if (!$accepted_oomc == 0){
                     //Update the qualified turnover fields 
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


    //Job for sending teh link to owner users
    public function job_send_link_for_scheduling(){
        $qualified = $this->Admin_model->get_turn_over_qualifieds();

        foreach($qualified as $data){
            $customer_number = $data->customer_number;
            $project = $data->project;
            $runitid = $data->runitid;
            $accepted_qcd = $data->accepted_qcd;
            $accepted_handover = $data->accepted_handover;
            $qualified_turnover = $data->qualified_turnover_date;
            
            if(!$accepted_qcd == 0){
                if (!$accepted_handover == 0){
                    $search_for_tickets = $this->Admin_model->get_ticket_number_by_customer_number($customer_number);
                    foreach($search_for_tickets as $data){
                        $ticket_id = $data->id;
                        $email = $data->email_address;
                        $encrypt_ticket_id = $this->dec_enc($ticket_id , 'encrypt');
                        $link = "http://localhost/weserve/default_user/schedule/". $encrypt_ticket_id;
                        echo "<script>alert('". $ticket_id ."');</script>";
                        $this->send_email($email, "WESERVE - For Scheduling link" , $link);
                    }
                }
            }else{
                //Do Nothing
            }
        }
        
    }

    
}


