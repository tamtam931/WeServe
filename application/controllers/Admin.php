<?php


class Admin extends CI_Controller {
    
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

         $data = array(
            'units' => ''
        );
        

        $this->load->view('header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('footer');
   }

    public function schedule() {

        $this->load->view('header');
        $this->load->view('admin/schedule');
   }

    public function administration() {
        $data = array(
            'positions' => $this->Admin_model->get_positions(),
            'users' => $this->Admin_model->get_users(),
            'unit_types' => $this->Admin_model->get_unit_types(),
            'checking_areas' => $this->Admin_model->get_checking_areas(),
            'sections' => $this->Admin_model->get_all_sections(),
            'roles' => $this->Admin_model->get_all_roles()
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
        $property = $this->input->post('property');
        $unit_number = $this->input->post('unit_number');
        $parking = $this->input->post('parking');
        $customer_name = $this->input->post('customer_name');
        $date = strtotime($this->input->post('selected_dt'));
        $time = $this->input->post('schedule_time');


        $new_date = date("Y/m/d H:i:s", $date);
        $dt = new DateTime($new_date);
        $new_dt = $dt->setTime(intval($time), 00);

        // get all asscoiates withotu schedule specific datetime

        $insert_data = array(
            'property' =>  $property,
            'unit_number' => $unit_number,
            'parking_number' => $parking,
            'customer_name' => $customer_name,
            'schedule' => $new_dt->format('Y-m-d H:i:s')
        );

        $insert_id = $this->Admin_model->add_turnover_schedule($insert_data);

        if($insert_id > 0) {
            echo "<script type='text/javascript'>alert('SMS and Email notification will be sent to Unit Owner. Selected schedule will be temporarily blocked for 24 hours and will be fully blocked once received confirmation from Unit Owner by replying YES to SMS and email message or clicking the link provided or providing the OTP to Inbound Associate.');</script>";
            redirect('admin/schedule/', 'refresh');
        }




    }

    public function get_schedule()
    {
        if($this->input->is_ajax_request()) {
            $events = $this->Admin_model->get_turnover_schedule_distinct();

            $data_events = array();
            $time = array(); 
            foreach($events as $event) {
                // $dt = date("YYYY-MM-DD",strtotime($sched->schedule);
                // $time[] = date("YYYY-MM-DD H",strtotime($sched->schedule));
                // $default_time = array($dt.'9',$dt.'11',$dt.'14', $dt.'16');

                $data_events[] = array(
                     "id" => $event->id,
                     "title" => date("hA",strtotime($event->schedule)) . " Fully Booked",
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
                'data' => $this->input->get("id")
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
        $type_id = $this->input->post('unit_id');
        $area = $this->input->post('area');
        $required_check = $this->input->post('required_check');

        $insert_data = array(
            'unit_type' =>  $type_id,
            'area_desc' => $area,
            'required' => $required_check
        );

        $insert_id = $this->Admin_model->add_checking_area($insert_data);

        if($insert_id > 0) {
            echo "<script type='text/javascript'>alert('Areas for checking has been successfully added.');</script>";
            redirect('admin/administration/'.$type_id.'/#btn_unit', 'refresh');
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

  

}


