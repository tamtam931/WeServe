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


    public function ticket_details() {
      $ticket = $this->Admin_model->get_ticket_by_id($this->uri->segment(3));
      $data = array(
          'ticket_bind' => $this->Admin_model->get_ticket_by_schedule_and_id($ticket->ticket_number, $ticket->project_code),
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
          'customer' => $this->Admin_model->get_customer_transaction_by_customer_number($this->uri->segment(3)),
      );
      

      $this->load->view('header');
      $this->load->view('handover_associate/acceptance_page', $data);
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
      $this->load->view('footer');
   }

   public function save_concern(){
      if($this->input->is_ajax_request()) {
          
        $ticket_id = $this->input->post("ticket_id");
        $temp_parking = $this->input->post("temp_parking");
        $temp_parking_remarks = $this->input->post("temp_parking_remarks");
        $other_concern = $this->input->post("other_concern");
       // var_dump($_FILES['userfile']); exit;
        $filename  = $ticket_id . '-OTHERCONCERN';
        $photo = '';
        $image = $this->do_upload( 'userfile', 'jpg|jpeg|png', './uploads/', $filename);
        if(isset($image)) {
          $photo = $image['upload_data']['file_name'];
        } 

       $insert_data = array(
        'ticket_id' => $ticket_id,
        'temporary_parking' => $temp_parking,
        'parking_remarks' => $temp_parking_remarks,
        'other_concern' => $other_concern,
        'attachment' => $photo
       );
       $insert_id = $this->Admin_model->add_ticket_checklist_others($insert_data);
       echo '<th scope="row">Other Concern</th><th scope="row">'.$other_concern.'<th><th scope="row"><img class="img-responsive" src="'.base_url('uploads/'.$photo).'" style="max-height:100px;max-width:150px;" /></th>';
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
      if($this->input->post('capture_img')) {
        $image = $this->do_upload( 'capture_img', '*', './uploads/', $filename);
        $photo = '';
        if(isset($image)) {
          $photo = $image['upload_data']['file_name'];
         
        } 
      }
      

      $insert_data = array(
        'ticket_number' => $ticket_number,
        'view_status' => $view_status,
        'team_huddle' => $team_huddle,
        'note' => $note,
        'attachment' => $photo,
        'created_by' => user('id')
      );
      $insert_id = $this->Admin_model->add_ticket_note($insert_data);

      if($insert_id > 0) {
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
          'ticket_bind' => $this->Admin_model->get_ticket_by_schedule_and_id($ticket_number, $ticket_details->project_code),
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
        echo "<script type='text/javascript'>alert('Certificate has been saved successfully.');</script>";
        redirect('handover/turnover_process/'.$ticket_details->ticket_id, 'refresh');
    }

    function save_pdf_parking_only(){
      $this->load->library('pdf');
      $dompdf = new Dompdf();
      $ticket_number = $this->uri->segment(3);
      $ticket_details = $this->Admin_model->get_ticket_by_ticket_number($ticket_number);

       $data = array(
          'ticket_bind' => $this->Admin_model->get_ticket_by_schedule_and_id($ticket_number, $ticket_details->project_code),
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
        echo "<script type='text/javascript'>alert('Certificate has been saved successfully.');</script>";
        redirect('handover/turnover_process/'.$ticket_details->ticket_id, 'refresh');
    }

    function save_pdf_unit_parking(){

      $this->load->library('pdf');
      $dompdf = new Dompdf();
      $ticket_number = $this->uri->segment(3);
      $ticket_details = $this->Admin_model->get_ticket_by_ticket_number($ticket_number);

      $data = array(
          'ticket_bind' => $this->Admin_model->get_ticket_by_schedule_and_id($ticket_number, $ticket_details->project_code),
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
        echo "<script type='text/javascript'>alert('Certificate has been saved successfully.');</script>";
        redirect('handover/turnover_process/'.$ticket_details->ticket_id, 'refresh');
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
  

}


