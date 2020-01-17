<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class sapProjectController extends CI_Controller
{

    private $user_id = '';
    private $role_id = '';	
    private $add;

	public function __construct(){

        parent::__construct();
        $this->user_id = user('id');
        $this->role_id = user('role');
        $this->load->model('weserve_sap');
        $this->load->model('weserve_sap_company');
        $this->load->model('weserve_sap_project');
        $this->load->model('weserve_sap_unit_type');
        $this->load->model('weserve_sap_floor');
        $this->load->model('weserve_sap_units');

	}

	public function index(){
		
		if ($this->input->is_ajax_request()) {

			if ($this->input->get()) {
				
					$params = $this->input->get('params');

					$switcher = $this->switcher([

						'page' => $params,
						'data' => null

					]);

					if ($switcher) {

						if ($switcher['page']) {
							
							$main_view = 'sap/'.$params.'/'.$switcher['page'];
							$data['list'] = $switcher['data'];

							$this->load->view($main_view,$data);

						}
						
					} else {

						$this->load->view('sap/dashboard_projects');
					}


			} else {

				$this->load->view('sap/dashboard_projects');
			}
					
		} else {

			redirect('sap');

		}		

	}

	public function create(){
		
		if ($this->input->is_ajax_request()) {

			if ($this->input->get()) {
			
				$params = $this->input->get('params');

				$switcher = $this->switcher([

					'page' => $params,
					'data' => null

				]);

				if ($switcher) {
					
					if ($switcher['page']) {

						$folder = substr($params, 7);
						$main_view = 'sap/'.$folder.'/'.$switcher['page'];

						$this->load->view($main_view);

					}

				} else {

					$this->load->view('sap/dashboard_projects');

				}		

			}
			
		} else {

			redirect('sap');

		}

	}

	public function store(){
		
		if ($this->input->is_ajax_request() && $this->input->post()) {

			$validation = array('success' => 'false','messages' => array());
			$this->form_validation->set_rules('sap_resource','SAP Resource','required|trim');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

			if ($this->form_validation->run() == TRUE) {
				
				$sap_params = $this->input->post('sap_resource');			
				$resource = $this->weserve_sap->all($this->input->post('sap_resource'));
	
				if ($resource) {
				
					$assoc_resource = json_decode($resource,true);

					$resource_length = count($assoc_resource);
					$ctr = 0;

					for ($i=0; $i < $resource_length ; $i++) { 
						
						$this->add = $this->switcher([

							'page' => null,
							'data' => [

								'params' => $sap_params,
								'resource' => $assoc_resource,
								'ctr' => $i
							]

						]);

						if ($this->add) {
							
							$ctr++;

						}
					}

					$validation['success'] = 'true';
					$validation['messages']['messagebox'] = 'SAP data successfully fetch! <strong>'.$ctr.' out of '.$resource_length.'</strong>';

				} else {

					$validation['success'] = 'error';
					$validation['messages']['messagebox'] = 'Failed on Fetching data from SAP! Please Try Again';

				}
				

			} else {

				foreach ($this->input->post() as $key => $value) {
					
					$validation['messages'][$key] = form_error($key);
				}				
			}


			$validation['button_val'] = 'Fetch Now';
			$validation['key'] = 'addSapProject';

			echo json_encode($validation);						

			
		} else {

			redirect('sap');

		}

	}

	public function show(){
		
		if ($this->input->is_ajax_request()) {

			if ($this->input->get()) {
				
				$params = $this->input->get('params');
				$id = array('id' => $this->uri->segment(3));

				$switcher = $this->switcher([

					'page' => $params,
					'data' => $id

				]);

				if ($switcher) {
					
					$folder = substr($params, 5);
					$main_view = 'sap/'.$folder.'/'.$switcher['page'];

					$data['get'] = $switcher['data'];

					$this->load->view($main_view,$data);				

				}

			} else {

				$this->load->view('sap/dashboard_projects');
			}
			
		} else {

			redirect('sap');

		}


	}

	public function edit(){
		
		if ($this->input->is_ajax_request()) {

			
		} else {

			redirect('sap');

		}

	}

	public function update(){
		
		if ($this->input->is_ajax_request() && $this->input->post()) {

			$id = array('id' => $this->uri->segment(3));
			$validation = array('success' => 'false','messages' => array());
			$this->form_validation->set_rules('is_activated','Activation','required|trim');
			$this->form_validation->set_rules('sap_params','SAP Parameter','required|trim');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
				
			if ($this->form_validation->run() == TRUE) {
			
				$update = $this->switcher([

					'page' => null,
					'data' => [

						'ctr' => $id['id'],
						'resource' => $this->input->post(),
						'params' => $this->input->post('sap_params')
					]

				]);

				if ($update) {
					
					$validation['success'] = 'true';
					$validation['messages']['messagebox'] = 'Data successfully updated!';

				} else {

					$validation['success'] = 'error';
					$validation['messages']['messagebox'] = 'Failed on updating data';
				}

			} else {

				foreach ($this->input->post() as $key => $value) {
					
					$validation['messages'][$key] = form_error($key);
				}				
			}

			$validation['button_val'] = 'Update Record';
			$validation['key'] = 'editSapProject';

			echo json_encode($validation);				

		} else {

			redirect('sap');

		}

	}

	public function destroy(){
		
		if ($this->input->is_ajax_request()) {


			
		} else {

			redirect('sap');

		}

	}


    /**
		Added Private Functions
		
    **/

    private function switcher(array $params){

    	$return_array = array('page' => null, 'data' => null);

    	if ($params) {
    			
    		if (!$params['data']) {
    			
				switch ($params['page']) {
					case 'company':
						$data = $this->weserve_sap_company->get_all();

						$return_array['page'] = 'list';
						$return_array['data'] = $data;

						break;
					case 'create_company':

						$return_array['page'] = 'add';

						break;

					case 'project':
						$data = $this->weserve_sap_project->get_all();

						$return_array['page'] = 'list';
						$return_array['data'] = $data;

						break;
					case 'create_project':

						$return_array['page'] = 'add';

						break;
					case 'unitType':
						$data = $this->weserve_sap_unit_type->get_all();

						$return_array['page'] = 'list';
						$return_array['data'] = $data;					

						break;
					case 'create_unitType':

						$return_array['page'] = 'add';

						break;
					case 'floor':
						$data = $this->weserve_sap_floor->get_all();

						$return_array['page'] = 'list';
						$return_array['data'] = $data;					

						break;
					case 'create_floor':

						$return_array['page'] = 'add';

						break;
																		
					default:
						return false;
						break;
				}

    		} else if (!$params['page']){
    			set_time_limit(0);
				$assoc_array = $params['data'];

				$index = $assoc_array['ctr'];

				$resource = $assoc_array['params'];

				unset($_POST['sap_resource']);
				unset($_POST['sap_params']);
				

    			if ($resource == 'Companies') {

					$_POST['company_code'] = $assoc_array['resource'][$index]['BUKRS'];
					$_POST['company_description'] = $assoc_array['resource'][$index]['BUTXT'];

					$this->add = $this->weserve_sap_company->insert($this->input->post());


    			} else if ($resource == 'Projects') {
    				
    				$_POST['company_code'] = $assoc_array['resource'][$index]['BUKRS'];

    				$sap_project_code = $assoc_array['resource'][$index]['SWENR'];

    				if (($pos = strpos($sap_project_code, "-")) !== FALSE) {

    					$tower_no = substr($sap_project_code, $pos+1);
    					$tower_code = explode('-', $sap_project_code);

    					$_POST['tower'] = trim($tower_no);
    					$_POST['project_code'] = trim($tower_code[0]); 

					} else {

						$_POST['tower'] = 'N\A';
						$_POST['project_code'] = 'N\A';
					}


    				//$_POST['project_description'] = $assoc_array['resource'][$index]['XWETEXT'];
    				$_POST['project'] = $assoc_array['resource'][$index]['XWETEXT'];
    				$_POST['project_code_sap'] = $sap_project_code;

    				$this->add = $this->weserve_sap_project->insert($this->input->post());

    			} else if($resource == 'UnitTypes'){

    				$_POST['unit_type_code'] = $assoc_array['resource'][$index]['HOMTYP'];
    				//$_POST['unit_type_description'] = $assoc_array['resource'][$index]['DESCR'];
    				$_POST['unit_type'] = $assoc_array['resource'][$index]['DESCR'];
    				$_POST['unit_type_abbreviation'] = $assoc_array['resource'][$index]['ZZABBR'];

    				$this->add = $this->weserve_sap_unit_type->insert($this->input->post());

    			} else if($resource == 'Phases'){

    				$_POST['floor_code'] = $assoc_array['resource'][$index]['PHASE'];
    				$_POST['company_code'] = $assoc_array['resource'][$index]['BUKRS'];
    				$_POST['project_code'] = $assoc_array['resource'][$index]['SWENR'];

    				$this->add = $this->weserve_sap_floor->insert($this->input->post());

    			} else if($resource == 'update_company'){

    				$this->add = $this->weserve_sap_company->update($this->input->post(),$index);

    			} else if ($resource == 'update_project'){

					$this->add = $this->weserve_sap_project->update($this->input->post(),$index);

    			} else if($resource == 'update_unitType'){

					$this->add = $this->weserve_sap_unit_type->update($this->input->post(),$index);

    			}

    			set_time_limit(30);
				$return_array['data'] = $this->add;    			

    		} else if($params['data'] && $params['page']){

    			$id = $params['data']['id'];

    			switch($params['page']){

    				case 'show_company':
	    				$data = $this->weserve_sap_company->get($id);

	    				$return_array['page'] = 'details';
	    				$return_array['data'] = $data;
    				$_POST['company_code'] = $assoc_array['resource'][$index]['BUKRS'];

    				$sap_project_code = $assoc_array['resource'][$index]['SWENR'];

    				if (($pos = strpos($sap_project_code, "-")) !== FALSE) {

    					$tower_no = substr($sap_project_code, $pos+1);
    					$tower_code = explode('-', $sap_project_code);

    					$_POST['tower'] = trim($tower_no);
    					$_POST['project'] = trim($tower_code[0]); 

					} else {

						$_POST['tower'] = 'N\A';
						$_POST['project'] = 'N\A';
					}
    					break;
    				case 'show_unitType':
	    				$data = $this->weserve_sap_unit_type->get($id);

	    				$return_array['page'] = 'details';
	    				$return_array['data'] = $data;

    					break;
    				case 'show_project':
	    				$data = $this->weserve_sap_project->get($id);

	    				$return_array['page'] = 'details';
	    				$return_array['data'] = $data;

    					break;    					    					
    			}
    		}

    		return $return_array;

    	} else {

    		return false;
    	}
    }
		
}