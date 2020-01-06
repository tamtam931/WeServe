<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class TurnOverScheduleController extends CI_Controller
{

    private $user_id = '';
    private $role_id = '';
    public $uri = '';

    public function __construct() {

        parent::__construct();
        $this->user_id = user('id');
        $this->role_id = user('role');
        $this->load->library('user_agent');
        $this->load->model('weserve_sap');
        $this->uri = '';

    }

    public function index(){

    	if ($this->input->is_ajax_request()) {
    		
    		if ($this->input->get('company') && $this->input->get('project')) {
    			
    			$company_code = $this->input->get('company');
    			$project_tower_code = $this->input->get('project');

    			$this->uri = 'Companies/'.$company_code.'/Towers/'.$project_tower_code.'/Units';

    			$units = $this->weserve_sap->all($this->uri);

    			var_dump($units);exit;

    		} else {

    			var_dump('nope');exit;

    		}

    		echo json_encode($data);

    	} else {

    		redirect('admin/schedule');
    	}

    }    	
}
