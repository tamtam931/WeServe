<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class sapUnitController extends CI_Controller
{

    private $user_id = '';
    private $role_id = '';
    private $unitResource = '';

	public function __construct(){

        parent::__construct();
        $this->user_id = user('id');
        $this->role_id = user('role');
        $this->load->model('weserve_sap');

	}

	public function index(){

		if ($this->input->is_ajax_request()) {
			
			if ($this->input->get('params')) {
				
			}

		} else {

			redirect('weserve');
		}

	}

	public function indexCompany(){

		if ($this->input->is_ajax_request()) {
			
			echo 'No Data Found';

		} else {

			redirect('weserve');
		}
		
	}

	public function indexCompanyProject(){

		if ($this->input->is_ajax_request()) {
			
			$sub_resource = array(
				'company_code' =>  $this->uri->segment(4),
				'project_code' =>  $this->uri->segment(6)
			);

			$this->unitResource = 'Companies/'.$sub_resource["company_code"].'/Towers/'.$sub_resource["project_code"].'/Units';

			if ($this->input->get('phase')) {

				$value = $this->input->get('phase');

				$resource = $this->unitResource.'?phase='.$this->input->get('phase');

				$units = $this->weserve_sap->all($this->unitResource,[
					'type' => 'GET',
					'params' => 'phase',
					'value' => $value
				]);

				echo json_encode($units);
			}

		} else {

			redirect('weserve');
		}
		
	}

	public function show(){

		if ($this->input->is_ajax_request()) {
			

		} else {

			redirect('weserve');
		}
		
	}
						    

}