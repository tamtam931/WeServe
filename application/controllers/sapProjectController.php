<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class sapProjectController extends CI_Controller
{

    private $user_id = '';
    private $role_id = '';	
    private $created_at;
    private $add;

	public function __construct(){

        parent::__construct();
        $this->user_id = user('id');
        $this->role_id = user('role');
        $this->load->model('weserve_sap');
        $this->load->model('weserve_sap_company');
        $this->load->model('weserve_sap_project');
        $this->load->model('weserve_sap_unit_type');
        $this->created_at = mdate("%Y-%m-%d:%H:%i",now('Asia/Manila'));

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
			$validation['key'] = 'addSapCompany';

			echo json_encode($validation);						

			
		} else {

			redirect('sap');

		}

	}

	public function show(){
		
		if ($this->input->is_ajax_request()) {

			
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
		
		if ($this->input->is_ajax_request()) {

			
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
					default:
						return false;
						break;
				}

    		} else if (!$params['page']){

				$assoc_array = $params['data'];

				$index = $assoc_array['ctr'];
				$resource = $assoc_array['params'];

				unset($_POST['sap_resource']);
				

    			if ($resource == 'Companies') {

					$_POST['company_code'] = $assoc_array['resource'][$index]['BUKRS'];
					$_POST['company_description'] = $assoc_array['resource'][$index]['BUTXT'];

					$this->add = $this->weserve_sap_company->insert($this->input->post());


    			} else if ($resource == 'Projects') {
    				
    				$_POST['company_code'] = $assoc_array['resource'][$index]['BUKRS'];
    				$_POST['project_code'] = $assoc_array['resource'][$index]['SWENR'];
    				$_POST['project_description'] = $assoc_array['resource'][$index]['XWETEXT'];

    				$this->add = $this->weserve_sap_project->insert($this->input->post());

    			} else if($resource == 'UnitTypes'){

    				$_POST['unit_type_code'] = $assoc_array['resource'][$index]['HOMTYP'];
    				$_POST['unit_type_description'] = $assoc_array['resource'][$index]['DESCR'];
    				$_POST['unit_type_abbreviation'] = $assoc_array['resource'][$index]['ZZABBR'];

    				$this->add = $this->weserve_sap_unit_type->insert($this->input->post());
    			}

				$return_array['data'] = $this->add;    			

    		}

    		return $return_array;

    	} else {

    		return false;
    	}
    }		
}