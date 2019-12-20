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
      $data = array(
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

    public function turnover_process() {
        $data = array(
          'ticket_details' => $this->Admin_model->get_ticket_by_id($this->uri->segment(3))
      );
      $this->load->view('header');
      $this->load->view('handover_associate/turnover_process', $data);
      $this->load->view('footer');
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
  

}


