<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Authme
{

    private $CI;
    protected $PasswordHash;

    public function __construct()
    {
        if (!file_exists($path = dirname(__FILE__) . '/../vendor/PasswordHash.php')) {
            show_error('The phpass class file was not found.');
        }
        $this->CI = &get_instance();

        $this->CI->load->database();
        $this->CI->load->library('session');
        $this->CI->load->model('auth_model');
        $this->CI->config->load('authme');

        include($path);
        $this->PasswordHash = new PasswordHash(8, $this->CI->config->item('authme_portable_hashes'));
    }

    public function logged_in(){
        return $this->CI->session->userdata('logged_in');
    }

    public function signin($username, $password)
    {
        $user = $this->CI->auth_model->login( $username, $this->dec_enc('encrypt', $password) );
        if ($user) {
            if ( $user->password ==  $this->dec_enc('encrypt', $password) ) { 
                $this->CI->session->set_userdata(array(
                    'logged_in' => true,
                    'user' => $user
                ));

                return true;
            } else { 
                return false;
            }
            
        } else {
           return false;
        }
        

    }

    public function dec_enc($action, $string) {
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

    public function signout($redirect = false)
    {
       // $this->CI->session->sess_destroy();
        session_destroy();
        if ($redirect) {
            $this->CI->load->helper('url');
            redirect($redirect, 'refresh');
        }
    }

 

}

/* End of file: authme.php */
/* Location: application/libraries/authme.php */