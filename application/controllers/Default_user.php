<?php


class Default_user extends CI_Controller {
    
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

    public function schedule() {

        $this->load->view('header');
        $this->load->view('default_user/schedule');
    
    }

    public function schedule_date() {
        if($this->input->is_ajax_request()) {
            $data = array(
                'sched' => $this->input->get("dt")
            );
            $this->load->view('admin/modals/schedule_modal_user', $data);
        } else {
            redirect('/', 'refresh');
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


