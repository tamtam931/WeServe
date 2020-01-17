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
        $this->load->model('Admin_model');
        $this->load->model('weserve_sap');
        $this->load->model('weserve_sap_units');

    }

    public function index(){

    	if ($this->input->is_ajax_request()) {
    		
    		if ($this->input->get('params')) {
    			 
                //var_dump($this->Admin_model->get_turn_over_qualifieds());exit;

                $list_units = [];
                $list_parking = [];

                $where = explode(" ", $this->input->get('params'));

                $data['units'] = $this->weserve_sap_units->where('company_code',$where[0])->where('project',$where[1])->get_all();

                for ($i=0; $i < count($data['units']); $i++) { 
                    
                    array_push($list_units, $data['units'][$i]['unit_number']);
                    array_push($list_parking, $data['units'][$i]['parking_number']);
 

                }

                $data['list']['unit_number'] = $list_units;
                $data['list']['parking_number'] = $list_parking;
                $data['success'] = 'true';
                $data['key'] = 'autoCompleteTO';
                $data['project_tower'] = $where[1];

    		} else {

    			

    		}

    		echo json_encode($data);

    	} else {

    		redirect('admin/schedule');
    	}

    }

    public function show(){

        if ($this->input->is_ajax_request()) {
            
            $id = array('id' => $this->uri->segment(2));



        } else {

            redirect('admin/schedule');
        }

    }    	
}
