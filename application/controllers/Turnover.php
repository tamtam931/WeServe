<?php

    class Turnover extends CI_Controller{
        public function __construct() {
            parent::__construct();
        }

        public function index($data = null) {
      
        }

        public function turnovers(){

            $datas = $this->Admin_model->get_unit_to_turnover();

            foreach($datas as $data){
                $customer_number = $data->customer_number;
                $email = $data->email_address;
                $project_code = $data->project;
                $customer_number_encrypt = $this->dec_enc($customer_number , 'encrypt');
                $uri_link = 'http://localhost/weserve/default_user/schedule/'. $customer_number_encrypt;
                $this->send_email($email , 'Link for Schedule' , $uri_link);
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
    }

?>