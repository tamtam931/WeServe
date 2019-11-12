<?php

class auth_model extends CI_Model {
       
    public function __construct() {
        parent::__construct();
        
    }
    
    public function login( $username = null, $password = null ) {
       $this->db->select("*"); 
       $this->db->where('username', $username);
       $this->db->where('password', $password);
       $this->db->from('tbl_users');
       $query = $this->db->get();
        
       return $query->row();
    }
    

    public function save_login_log($user_id) {
      $this->db->set('last_logon', date('Y-m-d H:i:s'));
      $this->db->where('id', $user_id);
      $this->db->update('tbl_users');
      return $this->db->affected_rows();
    }

 
}