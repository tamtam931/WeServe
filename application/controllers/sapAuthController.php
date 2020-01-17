<?php
/**
 
**/
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Exception\ClientException;

class sapAuthController extends CI_Controller
{

    private $user_id = '';
    private $role_id = '';

	public function __construct() {

        parent::__construct();
        $this->user_id = user('id');
        $this->role_id = user('role');
        $this->load->library('user_agent');
        $this->load->model('weserve_sap_config');
        
		$this->client = new Client();
		$this->jar = new CookieJar();
    }

    public function index(){

    	if ($this->input->is_ajax_request()) {
    			
    		$data['list'] = $this->weserve_sap_config->all();

    		$this->load->view('sap/auth/list',$data);
    		
    	} else {


    	}

    }

    public function create(){

    	if ($this->input->is_ajax_request()) {
    		
    		if ($this->input->post()) {
    			
				$validation = array('success' => 'false','messages' => array());
				$this->form_validation->set_rules('sap_scheme','SAP Protocol','required|trim|in_list[http,https]');
				$this->form_validation->set_rules('sap_domain','SAP Domain','required|trim');
				$this->form_validation->set_rules('sap_base','SAP base URI','required|trim');
				$this->form_validation->set_rules('auth_username','SAP Username','required|trim');
				$this->form_validation->set_rules('auth_password','SAP Password','required|trim|min_length[6]');
				$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');		

    			

    			if ($this->form_validation->run() == TRUE) {
    				
					$auth = array(
						'protocol' => $this->input->post('sap_scheme'),
						'domain' => $this->input->post('sap_domain'),
						'uri' => $this->input->post('sap_base'),
						'username' => $this->input->post('auth_username'),
						'password' => $this->input->post('auth_password')
					);

					$validate = $this->check_auth($auth);

					if ($validate) {

						$validation['success'] = 'true';
						$validation['messages']['messagebox'] = '200 OK - credentials successfully Authenticated!';
						$validation['jar'] = serialize($validate);

					} else {

						$validation['success'] = 'error';
						$validation['messages']['messagebox'] = '401 Result - credentials was not authorized!';

					}


    			} else {

					foreach ($this->input->post() as $key => $value) {
						
						$validation['messages'][$key] = form_error($key);
					}

    			}

    			$validation['button_val'] = 'Check Authentication';

				echo json_encode($validation);

    		} else  {

    			$this->load->view('sap/auth/add');
    		}

    	} else {

    		redirect('sap');
    	}
    	
    }

    public function store(){

    	if ($this->input->is_ajax_request() && $this->input->post()) {
    		
			$validation = array('success' => 'false','messages' => array());
			$this->form_validation->set_rules('sap_scheme','SAP Protocol','required|trim|in_list[http,https]');
			$this->form_validation->set_rules('sap_domain','SAP Domain','required|trim');
			$this->form_validation->set_rules('sap_base','SAP base URI','required|trim');
			$this->form_validation->set_rules('sap_client','SAP Client Code','required|trim|integer');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

			if ($this->form_validation->run() == TRUE) {
					
				$_POST['created_at'] = mdate("%Y-%m-%d:%H:%i",now('Asia/Manila'));

				$add = $this->weserve_sap_config->save($this->input->post());

				if ($add) {
					
					$validation['success'] = 'true';
					$validation['messages']['messagebox'] = 'New SAP Configuration has been Added!';
					
				} else {

					$validation['success'] = 'error';
					$validation['messages']['messagebox'] = 'Failed to create SAP Configuration.';				
				}

			} else {

				foreach ($this->input->post() as $key => $value) {
					
					$validation['messages'][$key] = form_error($key);
				}

			}

			$validation['button_val'] = 'Create SAP Configuration';
			$validation['key'] = 'addSapAuth';

			echo json_encode($validation);	

    	} else {

    		redirect('sap');
    	}
    	
    }

    public function show(){

    	if ($this->input->is_ajax_request()) {
    		
    		$id = array('id' => $this->uri->segment(3));
    		$raw = $this->weserve_sap_config->findOrfail($id);
    		$config = $raw[0];

    		$data = array('config' => $config, 'raw' => $raw);

    		$this->load->view('sap/auth/delete',$data);

    	} else {

    		redirect('sap');
    	}
    	
    }

    public function edit(){

    	if ($this->input->is_ajax_request()) {
    		
    		$id = array('id' => $this->uri->segment(3));
    		$raw = $this->weserve_sap_config->findOrfail($id);
    		$config = $raw[0];

    		$data = array('config' => $config, 'raw' => $raw);

    		$this->load->view('sap/auth/details',$data);

    	} else {

    		redirect('sap');

    	}
    	
    }

    public function update(){

    	if ($this->input->is_ajax_request() && $this->input->post()) {
    		
			$validation = array('success' => 'false','messages' => array());
			$this->form_validation->set_rules('sap_scheme','SAP Protocol','required|trim|in_list[http,https]');
			$this->form_validation->set_rules('sap_domain','SAP Domain','required|trim');
			$this->form_validation->set_rules('sap_base','SAP base URI','required|trim');
			$this->form_validation->set_rules('sap_client','SAP Client Code','required|trim|integer');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

			if ($this->form_validation->run() == TRUE) {
				
				$_POST['updated_at'] = mdate("%Y-%m-%d:%H:%i",now('Asia/Manila'));
				$id = array('id' => $this->uri->segment(3));

				$update = $this->weserve_sap_config->update($id,$this->input->post());

				if ($update) {
					
					$validation['success'] = 'true';
					$validation['messages']['messagebox'] = 'SAP Configuration successfully updated!';
					
				} else {

					$validation['success'] = 'error';
					$validation['messages']['messagebox'] = 'Failed to update SAP Configuration data.';				
				}				

			} else {

				foreach ($this->input->post() as $key => $value) {
					
					$validation['messages'][$key] = form_error($key);
				}				

			}

			$validation['button_val'] = 'Update SAP Data';
			$validation['key'] = 'editSapAuth';
			echo json_encode($validation);

    	} else {

    		redirect('sap');

    	}
    	
    }

    public function destroy(){

    	if ($this->input->is_ajax_request()) {
    		
			$id = array('id' => $this->uri->segment(3));

			$raw = $this->weserve_sap_config->findOrfail($id);
			$db = $raw[0];

			if ($db['deleted_at']) {
				
				$_POST['deleted_at'] = null;

			} else {

				$_POST['deleted_at'] = mdate("%Y-%m-%d:%H:%i",now('Asia/Manila'));
			}

			$del_data = array('deleted_at' => $this->input->post('deleted_at'));

			$deleted = $this->weserve_sap_config->update($id,$del_data);

			if ($deleted) {

				$validation['success'] = 'true';
				$validation['messages']['messagebox'] = 'Database successfully disabled!';

			} else {

				$validation['success'] = 'error';
				$validation['messages']['messagebox'] = 'Failed to disable the data!';
							
			}

			$validation['key'] = 'delSapAuth';

			echo json_encode($validation);

    	} else {


    	}
    	
    }

    /**
		Added Private Functions
		
    **/

    private function check_auth($auth){


    	if ($auth) {

			try {

		    	$url = $auth['protocol'].'://'.$auth['domain'].$auth['uri'].'UnitTypes';
		    	$credentials = [
		    		$auth['username'],
		    		$auth['password']
		    	];

				$response = $this->client->get($url, ['auth' => $credentials,'cookies' => $this->jar]);

				$statusCode = $response->getStatusCode();
				
				if ($statusCode) {
					
					if ($statusCode == 200 || $statusCode == 201) {
						
						return $this->jar->toArray();
						

					} else if ($statusCode == 401 || $statusCode == 404) {


						return false;

					}

				} else {


					return false;
				}				
										    		
			} catch (ClientException $e) {

				
				return false;
										    		
			}							    	

    	}

    	return false;

    }                        


}