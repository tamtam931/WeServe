<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class weserve_sap_config extends CI_Model {

	private $table = '';

	function __construct(){

		parent::__construct();
		$this->table = 'tbl_sap_config';
	}

	public function all(){

		$this->db->select('*');
		$this->db->from($this->table);
		$query = $this->db->get();

		$rowcount = $query->num_rows();

		if ($rowcount > 0) {
			
			return $query->result_array();

		} else {

			return false;
		}

	}

	public function save(array $formData){
		
		if ($formData) {
			
            $this->db->insert($this->table,$formData);
            $insert_id = $this->db->insert_id();

            if ($insert_id) {
            	
            	return  $insert_id;
            }

		}

		return false;

	}

	public function findOrfail($where){

		$this->db->select('*');
		$this->db->from($this->table);
		if($where){

			$this->db->where($where);
		}
		$query = $this->db->get();

		$rowcount = $query->num_rows();

		if ($rowcount > 0) {
			
			return $query->result_array();

		} else {

			return false;
		}

	}

	public function update($id,array $formData){

		$data = false;
        if($id && $formData)
        {   
            $this->db->where($id);
            $data = $this->db->update($this->table,$formData);
        }

        return $data;	

	}

	public function delete($id){
		

	}	


}