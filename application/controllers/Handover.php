<?php


class Handover extends CI_Controller {
    
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
      $this->load->view('handover_associate/main');
      $this->load->view('footer');
   }

    public function my_dashboard() {
      
      $data = array(
          'tickets' => $this->Admin_model->get_tickets_by_assigned_to(user('id'))
      );
      $this->load->view('header');
      $this->load->view('handover_associate/my_dashboard', $data);
      $this->load->view('footer');
   }

    public function dashboard() {

       $data = array(
          'units' => ''
      );
      

      $this->load->view('header');
      $this->load->view('handover_associate/dashboard', $data);
      $this->load->view('footer');
   }

    public function schedule_specific() {

      $this->load->view('header');
      $this->load->view('handover_associate/schedule_specific');
   }

   function save_pdf_unit_parking(){

    $this->load->library('pdf');
    $dompdf = new Dompdf();
    $ticket_number = $this->uri->segment(3);
    $ticket_details = $this->Admin_model->get_ticket_by_ticket_number($ticket_number);

    $data = array(
        'ticket_bind' => $this->Admin_model->get_ticket_by_schedule_and_id($ticket_number, $ticket_details->project_code_sap),
        'ticket_details' => $this->Admin_model->get_ticket_by_id($ticket_details->ticket_id)
    );

      $msg = $this->load->view('handover_associate/part/certificate_unit_parking',$data, true);
      
      $html = mb_convert_encoding($msg, 'HTML-ENTITIES', 'UTF-8');
      $dompdf->load_html($html);

      $paper_orientation = 'Portrait'; 
      $dompdf->set_paper($paper_orientation);

      $dompdf->render();
      //$this->pdf->stream($ticket_number ."-CertificateOrPurchaseAndDeliveryTurnover.pdf");
      $pdfroot = 'documents/'.$ticket_number ."-CertificateOrPurchaseAndDeliveryTurnover_UnitParking.pdf";
      $pdf_string =   $dompdf->output();
      
      file_put_contents($pdfroot, $pdf_string ); 

      // save filename to tbl_tickets acceptance_document
      $this->Admin_model->update_acceptance_document($ticket_details->ticket_id, $ticket_number ."-CertificateOrPurchaseAndDeliveryTurnover_UnitParking.pdf");

      // update tbl_units status for turnover dashboard here
      $this->Admin_model->update_status_unit_overall($ticket_details->project_code_sap, $ticket_details->runitid, 14);

      echo "<script type='text/javascript'>alert('Acceptance of Unit is now completed.');</script>";

      $temp_parking_flag = $this->uri->segment(4);
      if($temp_parking_flag == 'Y') {
        redirect('handover/temporary_parking/'.$ticket_details->ticket_id, 'refresh');
      } else {
        redirect('handover/turnover_process/'.$ticket_details->ticket_id.'/UP', 'refresh');
      }
      
  }

  public function ticket_details() {
    $ticket = $this->Admin_model->get_ticket_by_id($this->uri->segment(3));
    $data = array(
        'ticket_bind' => $this->Admin_model->get_ticket_by_schedule_and_id($ticket->ticket_number, $ticket->project_code_sap),
        'ticket_details' => $this->Admin_model->get_ticket_by_id($this->uri->segment(3))
    );
    $this->load->view('header');
    $this->load->view('handover_associate/ticket_details', $data);
    $this->load->view('footer');
 }


   public function buyer_details() {
    
      $data = array(
          'customer' => $this->Admin_model->get_customer_transaction_by_customer_number($this->uri->segment(3)),
      );
    
      $this->load->view('header');
      $this->load->view('handover_associate/buyer_info', $data);
      $this->load->view('footer');
   }

    public function acceptance_page() {
    
      $data = array(
          'customer' => $this->Admin_model->get_customer_transaction_by_customer_number($this->uri->segment(3))
      );
      

      $this->load->view('header');
      $this->load->view('handover_associate/acceptance_page', $data);
      $this->load->view('footer');
   }

    public function temporary_parking() {
    
      $data = array(
          'ticket_details' => $this->Admin_model->get_ticket_by_id($this->uri->segment(3)),
          'temporary_parking' => $this->Admin_model->get_ticket_other_concern_by_ticket_id($this->uri->segment(3))
      );
      

      $this->load->view('header');
      $this->load->view('handover_associate/temporary_parking', $data);
      $this->load->view('footer');
   }

    public function turnover_process() {
      $ticket = $this->Admin_model->get_ticket_by_id($this->uri->segment(3));
      $data = array(
          'ticket_bind' => $this->Admin_model->get_ticket_by_schedule_and_id($ticket->ticket_number, $ticket->project_code),
          'ticket_details' => $this->Admin_model->get_ticket_by_id($this->uri->segment(3))
      );
      $this->load->view('header');
      $this->load->view('handover_associate/turnover_process', $data);
      // $this->load->view('footer');
   }

   public function save_concern(){
      if($this->input->is_ajax_request()) {
          
        $ticket_id = $this->input->post("ticket_id");
        $temp_parking = $this->input->post("temp_parking");
        $temp_parking_remarks = $this->input->post("temp_parking_remarks");
        $other_concern = $this->input->post("other_concern");
       //var_dump($_FILES['userfile']["name"] ); exit;

       
        $photo = '';
        if($_FILES['userfile']["name"] != "") {
           $filename  = $ticket_id . '-OTHERCONCERN';
          $image = $this->do_upload( 'userfile', 'jpg|jpeg|png', './uploads/', $filename);
          if(isset($image)) {
            $photo = $image['upload_data']['file_name'];
          } 
        }
        

       $insert_data = array(
        'ticket_id' => $ticket_id,
        'temporary_parking' => $temp_parking,
        'parking_remarks' => $temp_parking_remarks,
        'other_concern' => $other_concern,
        'attachment' => $photo
       );
       $insert_id = $this->Admin_model->add_ticket_checklist_others($insert_data);
       echo '<tr><th scope="row">Other Concern</th><th scope="row">'.$other_concern.'<br><b>Temporary Parking:</b>'.$temp_parking.'<br><b>Temporary Parking Remarks:</b>'.$temp_parking_remarks.'</th><th scope="row"><img class="img-responsive" src="'.base_url('uploads/'.$photo).'" style="max-height:100px;max-width:150px;" /></th></tr>';
      } else {
          redirect('admin/my_dashboard/', 'refresh');
      }
   }


  public function add_ticket_note() {
      $ticket_id = $this->input->post('ticket_id');
      $ticket_number = $this->input->post('ticket_number');
      $view_status = $this->input->post('status');
      $team_huddle = $this->input->post('team_huddle');
      $note = $this->input->post('note');
      $filename  = $ticket_number . '-NOTE';

      $photo = '';
      if($_FILES['capture_img']) {
        $image = $this->do_upload( 'capture_img', '*','./uploads/', $filename);
       
        $photo = '';
        if(isset($image["error_msg"])) {
          echo "<script type='text/javascript'>alert('ERROR: ".$image["error_msg"]."');</script>";
         
        } else {
          $photo = $image['upload_data']['file_name'];
        }
      }
      

      $insert_data = array(
        'ticket_number' => trim($ticket_number),
        'view_status' => $view_status,
        'team_huddle' => $team_huddle,
        'note' => $note,
        'attachment' => $photo,
        'created_by' => user('id')
      );
      $insert_id = $this->Admin_model->add_ticket_note($insert_data);

      if($insert_id > 0) {
        // ADD TO ACTIVITY 
        if($photo) {
            $photo_url = base_url('uploads/'.$photo);
            $description = $note . "<br> <a href='".$photo_url."'>Attachment</a>";
        } else {
            $description = $note;
        }
        
        $act_data = array(
          'ticket_id' => $ticket_id,
          'description' => $description,
          'created_by' => user('id'),
          'status' => $view_status
        );
        $this->Admin_model->add_activity_log($act_data);

        echo "<script type='text/javascript'>alert('Note has been successfully added.');</script>";
        redirect('handover/ticket_details/'.$ticket_id, 'refresh');
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

   public function turnover_no_show(){

      $ticket_id = $this->input->post('ticket_id');
      $ticket_type = $this->input->post('ticket_type');
      $ticket_number = $this->input->post('ticket_number');
      $update_id = $this->Admin_model->update_show_status_turnover_schedule($ticket_number, 1);

      // add to logs
      $description = "Unit Owner / Authorized Representative did not show up. System notification will be sent to them.";
      $act_data = array(
        'ticket_id' => $this->input->post('ticket_id'),
        'description' => $description,
        'created_by' => user('id'),
        'status' => 0
      );
      $update_id = $this->Admin_model->add_activity_log($act_data);

      // send sms and email to unit owner
      $message = "YOU HAVE BEEN TAGGED AS NO SHOW"; 
      $this->send_email($this->input->post('buyer_email'), 'WESERVE: TURNOVER SCHEDULE', $message);
      // SMS
      $this->send_sms($this->input->post('buyer_mobile'), $message);



      // queue to outbound associate
      // create ticket - random assigning to outbound associate
        $o_associates = array();
        $outbounds = $this->Admin_model->get_all_outbound_associate();
        foreach ($outbounds as $outbound) {
            $o_associates[] = $outbound->user_id;
        }

        $outbound_rand = array_rand($o_associates);
        $outbound_assigned = $o_associates[$outbound_rand];

        $this->Admin_model->update_ticket_subject($ticket_number, $outbound_assigned, 'FOR CALLOUT','For Call Confirmation of Outbound Associate');
      // email to outbound associate
        $user = $this->Admin_model->get_user_by_id($outbound_assigned);
        $message = "THE TICKET ".$ticket_number. " HAS BEEN ASSIGNED TO YOU. PLEASE LOGIN YOUR ACCOUNT FOR MORE INFO."; 
        $this->send_email($user->email_address, 'WESERVE: ASSIGNED TICKET', $message);


        // DEEMED LEGALLY ACCEPTANCE

      if($update_id > 0) {
        // UPDATE UNIT STATUS - 10 (NO SHOW)
        $customers =$this->Admin_model->get_all_tickets_by_ticket_number($ticket_number);
        foreach($customers as $customer) {
           $unit_details = $this->Admin_model->get_buyer_transaction_by_customer_number($customer->customer_number);
          $this->Admin_model->update_status_unit_overall($unit_details->project, $unit_details->runitid, 10);
        }
       

        echo "<script type='text/javascript'>alert('Turnover status has been updated.');</script>";
        redirect('handover/ticket_details/'.$ticket_id.'/'.$ticket_type, 'refresh');
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

    function save_pdf_unit_only(){
      $this->load->library('pdf');
      $dompdf = new Dompdf();
      $ticket_number = $this->uri->segment(3);
      $ticket_details = $this->Admin_model->get_ticket_by_ticket_number($ticket_number);

      $data = array(
          'ticket_bind' => $this->Admin_model->get_ticket_by_schedule_and_id($ticket_number, $ticket_details->project_code_sap),
          'ticket_details' => $this->Admin_model->get_ticket_by_id($ticket_details->ticket_id)
      );
        
        $msg = $this->load->view('handover_associate/part/certificate_unit',$data, true);
        $html = mb_convert_encoding($msg, 'HTML-ENTITIES', 'UTF-8');
        $dompdf->load_html($html);

        $paper_orientation = 'Portrait'; 
        $dompdf->set_paper($paper_orientation);

        $dompdf->render();
        //$this->pdf->stream($ticket_number ."-CertificateOrPurchaseAndDeliveryTurnover.pdf");
        $pdfroot = 'documents/'.$ticket_number ."-CertificateOrPurchaseAndDeliveryTurnover_UnitOnly.pdf";
        $pdf_string =   $dompdf->output();
        
        file_put_contents($pdfroot, $pdf_string ); 

        // save filename to tbl_tickets acceptance_document
        $this->Admin_model->update_acceptance_document($ticket_details->ticket_id, $ticket_number ."-CertificateOrPurchaseAndDeliveryTurnover_UnitOnly.pdf");

        // update tbl_units status for turnover dashboard here
        $this->Admin_model->update_status_unit_overall($ticket_details->project_code_sap, $ticket_details->runitid, 14);

        echo "<script type='text/javascript'>alert('Acceptance of Unit is now completed.');</script>";
        $temp_parking_flag = $this->uri->segment(4);
        if($temp_parking_flag == 'Y') {
          redirect('handover/temporary_parking/'.$ticket_details->ticket_id, 'refresh');
        } else {
          redirect('handover/turnover_process/'.$ticket_details->ticket_id.'/UP', 'refresh');
        }
    }


    function save_pdf_parking_only(){
      $this->load->library('pdf');
      $dompdf = new Dompdf();
      $ticket_number = $this->uri->segment(3);
      $ticket_details = $this->Admin_model->get_ticket_by_ticket_number($ticket_number);

       $data = array(
          'ticket_bind' => $this->Admin_model->get_ticket_by_schedule_and_id($ticket_number, $ticket_details->project_code_sap),
          'ticket_details' => $this->Admin_model->get_ticket_by_id($ticket_details->ticket_id)
      );
        
        $msg = $this->load->view('handover_associate/part/certificate_parking',$data, true);
        $html = mb_convert_encoding($msg, 'HTML-ENTITIES', 'UTF-8');
        $dompdf->load_html($html);

        $paper_orientation = 'Portrait'; 
        $dompdf->set_paper($paper_orientation);

        $dompdf->render();
        //$this->pdf->stream($ticket_number ."-CertificateOrPurchaseAndDeliveryTurnover.pdf");
        $pdfroot = 'documents/'.$ticket_number ."-CertificateOrPurchaseAndDeliveryTurnover_ParkingOnly.pdf";
        $pdf_string =   $dompdf->output();
        
        file_put_contents($pdfroot, $pdf_string ); 

        // save filename to tbl_tickets acceptance_document
        $this->Admin_model->update_acceptance_document($ticket_details->ticket_id, $ticket_number ."-CertificateOrPurchaseAndDeliveryTurnover_ParkingOnly.pdf");

        // update tbl_units status for turnover dashboard here
        $this->Admin_model->update_status_unit_overall($ticket_details->project_code_sap, $ticket_details->runitid, 14);

        echo "<script type='text/javascript'>alert('Acceptance of Unit is now completed.');</script>";
        $temp_parking_flag = $this->uri->segment(4);
        if($temp_parking_flag == 'Y') {
          redirect('handover/temporary_parking/'.$ticket_details->ticket_id, 'refresh');
        } else {
          redirect('handover/turnover_process/'.$ticket_details->ticket_id.'/UP', 'refresh');
        }
    }


 


    function save_pdf_temporary_parking(){

      $this->load->library('pdf');
      $dompdf = new Dompdf();
      $ticket = $this->Admin_model->get_ticket_by_id($this->uri->segment(3));
      $data = array(
          'ticket_details' => $ticket,
          'temporary_parking' => $this->Admin_model->get_ticket_other_concern_by_ticket_id($this->uri->segment(3))
      );

        $msg = $this->load->view('handover_associate/part/temporary_parking_part',$data, true);
        
        $html = mb_convert_encoding($msg, 'HTML-ENTITIES', 'UTF-8');
        $dompdf->load_html($html);

        $paper_orientation = 'Portrait'; 
        $dompdf->set_paper($paper_orientation);

        $dompdf->render();
        //$this->pdf->stream($ticket_number ."-CertificateOrPurchaseAndDeliveryTurnover.pdf");
        $pdfroot = 'documents/'.$ticket->ticket_number ."-TemporaryParkingSlotAllocation.pdf";
        $pdf_string =   $dompdf->output();
        
        file_put_contents($pdfroot, $pdf_string ); 

        // save filename to tbl_tickets temporary_parking_document
        $this->Admin_model->update_temp_parking_document($ticket->ticket_id, $ticket->ticket_number ."-TemporaryParkingSlotAllocation.pdf");

        echo "<script type='text/javascript'>alert('Temporary parking is successfully assigned to Unit.');</script>";
        redirect('handover/turnover_process/'.$this->uri->segment(3).'/UP', 'refresh');

        
    }


    public function add_turnover_process() {

      //var_dump(htmlspecialchars($this->input->post('signature_output'))); exit;
      $count = $this->input->post('count_inputs');
      $ticket_number = $this->input->post('ticket');
      $unit_type = $this->input->post('unit_type_id');
      $ticket_type = $this->input->post('ticket_type');
      $ticket_id = $this->input->post('ticket_id');
      $checklist_checker = $this->Admin_model->get_ticket_checklist_by_ticketid($ticket_number);

      if($checklist_checker) {
          // delete if existing checklist record
          $this->Admin_model->delete_ticket_checklist($ticket_number);
      }
      $insert_id = 0;
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
        // ADD ACTIVITY
        $description = "Unit/Parking has been accepted by Unit Owner.";
        $act_data = array(
          'ticket_id' => $ticket_id,
          'description' => $description,
          'created_by' => user('id'),
          'status' => 0
        );
        $this->Admin_model->add_activity_log($act_data);

        // update tbl_units status for turnover dashboard here
        $ticket_data = $this->Admin_model->get_ticket_by_id($ticket_id);
        $this->Admin_model->update_status_unit_overall($ticket_data->project_code_sap, $ticket_data->runitid, 11);

          echo "<script type='text/javascript'>alert('Turnover Checklist has been successfully saved.');</script>";
          //redirect('admin/turnover_process/'.$unit_type, 'refresh');
          $ticket = $this->Admin_model->get_ticket_by_id($ticket_id);

          $data = array(
              'ticket_bind' => $this->Admin_model->get_ticket_by_schedule_and_id($ticket->ticket_number, $ticket->project_code_sap),
              'ticket_details' => $this->Admin_model->get_ticket_by_id($ticket_id),
              'ticket_type' => $ticket_type,
              'ticket_id' => $ticket_number
          );
          $this->load->view('header');
          $this->load->view('handover_associate/acceptance_page', $data);
          $this->load->view('footer');
      } 


  }

    public function save_signature_ajax(){
      if($this->input->is_ajax_request()) {
        $imagedata = $this->input->post('imagedata');
        $ticket_id = $this->input->post('ticket_id');
        $update_id = $this->Admin_model->update_acceptance_signature($ticket_id, $imagedata);
        echo $this->input->get('imagedata');

      } else {
          redirect('admin/my_dashboard/', 'refresh');
      }
    }

    public function send_sms($mobile, $message){

        $data_array = array(
            'mobile' => $mobile,
            'message' => $message
        );
        $data = json_encode($data_array);
        $curl = curl_init();
        $request_headers[] = 'Content-Type: application/json';
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
          CURLOPT_HTTPHEADER => $request_headers,
          CURLOPT_RETURNTRANSFER  => 1,
          CURLOPT_URL => "http://10.15.7.199/smsgateway/api/v1/sms/send",
          CURLOPT_POST =>  1,
          CURLOPT_POSTFIELDS => $data
                                                                                                                        
        ));
        // Send the request & save response to $resp
        $sXML = curl_exec($curl);
        return $sXML;
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
    
    
    //From Viel 08 , 2019
    public function update_unit_status(){
      if($this->input->is_ajax_request()) {
        $project = $this->input->post('project');
        $runitid = $this->input->post('runitid');
        $status = $this->input->post('status');

        $update_id = $this->Admin_model->update_status_unit_overall($project, $runitid, $status);
        
      } else {
          redirect('admin/my_dashboard/', 'refresh');
      }
    }

    
}


