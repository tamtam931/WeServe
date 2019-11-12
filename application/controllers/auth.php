<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
    public $user= "";

	public function __construct() {
        parent::__construct();
        $this->output->enable_profiler(FALSE);
    }

    public function index()
    {

        if (!logged_in()) {

            $data = array(
                'page' => "",
                'page_title' => "Sign in"
            );
            $this->load->view('header', $data);
            $this->load->view('auth/account');
            $this->load->view('footer');
           
        } else {
            $this->dashboard();
        }

    }

    public function login()
    {
        if (!logged_in()) {
            $error = "";
            if ($this->authme->signin( set_value('username'), set_value('password') )) {
                $this->auth_model->save_login_log(user('id'));
                $this->dashboard();
            } else {
                
                $error = 'Invalid Username and/or Password.';
            }
      
            $data = array(
                'page' => "",
                'page_title' => "Sign in",
                'error' => $error
            );
            $this->load->view('header', $data);
            $this->load->view('auth/account');
            $this->load->view('footer');
        }
    }

    public function dashboard()
    {
       // redirect to first page after login
        redirect('admin/my_dashboard/'.user('id'), 'refresh');
    }
    
    public function logout()
    {
        if (!logged_in()) {
            redirect('/');
        } else {
            $this->authme->signout('/');
            
        }
    }


     public function dec_enc($string, $action) {
        // you may change these values to your own
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

    public function multiple_random_strings_encrypt($array) {
        $values = array();
        for ($x = 0; $x <= count($array); $x++) {
            # code...
            $values[] = $this->dec_enc($array[$x], 'encrypt');
        }
        return implode( "<br>", $values );
    }

   

  
}