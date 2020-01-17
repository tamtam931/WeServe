<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class sapCustomerController extends CI_Controller
{

    private $user_id = '';
    private $role_id = '';	
    private $add;

	public function __construct(){

        parent::__construct();
        $this->user_id = user('id');
        $this->role_id = user('role');
        $this->load->model('weserve_sap');
        $this->load->model('weserve_sap_customer');
        $this->load->model('weserve_buyersDocuments');

	}

	public function index(){

		if ($this->input->is_ajax_request()) {
			
			$customers = $this->weserve_sap_customer->get_all();
			$data = array('list' =>  $customers);

			$this->load->view('sap/customer/list',$data);

		} else {

			redirect('sap');
		}


	}

	public function create(){

		if ($this->input->is_ajax_request()) {
			
			$this->load->view('sap/customer/add');

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
				
				$params = $this->input->post('sap_resource');
				unset($_POST['sap_resource']);

				$ctr = 1;

				set_time_limit(0);
				while(true){

					$resource = $this->weserve_sap->all($params,[
							'type' => 'paginate',
							'index' => $ctr,
							'limit' => 50
					]);

					$assoc_resource = json_decode($resource,true);
					$resource_length = count($assoc_resource);					

					if ($resource) {

						for ($i=0; $i < $resource_length; $i++) { 
							
							if ($assoc_resource[$i]['DATA']['KTOKD'] !== 'KUNA') {
								
								continue;
							}


							$_POST['customer_number'] = $assoc_resource[$i]['KUNNR'];

							$_POST['customer_name'] = $assoc_resource[$i]['PARTNER_DATA']['NAME_FIRST'].' '.$assoc_resource[$i]['PARTNER_DATA']['NAME_LAST'];
							$phone_length = count($assoc_resource[$i]['PHONE']);

							if ($phone_length > 0) {
								
								for ($x=0; $x < $phone_length; $x++) { 
									
									$number_type = $assoc_resource[$i]['PHONE'][$x]['R_3_USER'];
									
									if ($number_type == 1) {

										$_POST['telephone'] = $assoc_resource[$i]['PHONE'][$x]['TELEPHONE'];
										$_POST['mobile_number'] = null;
										$_POST['default_no'] = null;

									} else if ($number_type == 2) {
										
										$_POST['mobile_number'] = $assoc_resource[$i]['PHONE'][$x]['TEL_NO'];
										$_POST['telephone'] = null;
										$_POST['default_no'] = null;										

									} else if ($number_type == 3) {
										
										$_POST['default_no'] = $assoc_resource[$i]['PHONE'][$x]['CALLER_NO'];
										$_POST['mobile_number'] = null;
										$_POST['telephone'] = null;										
									}

								}

							}

							$_POST['email_address'] = ($assoc_resource[$i]['EMAIL'] ? $assoc_resource[$i]['EMAIL'][0]['E_MAIL'] : null);
							$_POST['address'] = $assoc_resource[$i]['ADDRESS']['STREET'].', '.$assoc_resource[$i]['ADDRESS']['CITY'];
							$_POST['birthday'] = $this->getBirtDate($assoc_resource[$i]['PARTNER_DATA']['BIRTH_DATE']);
							$_POST['civil_status'] = $assoc_resource[$i]['PARTNER_DATA']['MARITAL_ST'];
							$_POST['tin'] = $assoc_resource[$i]['DATA']['STCD1'];
							$_POST['gender'] = ($assoc_resource[$i]['PARTNER_DATA']['SEX'] == 2 ? 'Male' : 'Female');

							/*
								Added insertion of Customer's Notices on table tbl_buyer's documents
								Author: Ben Zarmaynine E. Obra
								Date: 01-09-20
							*/
							foreach ($assoc_resource[$i]['NOTICE'] as $key => $value) {
								
								$_POST['document_description'] = $key;
								$_POST['status_date'] = $this->getBirtDate($value);
								$_POST['document_type'] = 'NOTICE';

								$this->weserve_buyersDocuments->insert($this->input->post(['customer_number','document_description','status_date','document_type']));
							}														

							/*
								Destroy post parameters for notices insert
							*/							
							unset($_POST['document_description']);
							unset($_POST['status_date']);
							unset($_POST['document_type']);
								
							//end

							$add = $this->weserve_sap_customer->insert($this->input->post());														

						}
						$ctr++;

					} else {

						$validation['success'] = 'true';
						$validation['messages']['messagebox'] = 'Customer fetching data finished!';
						$validation['key'] = 'addCustomer';
						$validation['btn_val'] = 'Fetch Now';
						break;
						set_time_limit(30);
						
					}

										
				}

				echo json_encode($validation);

			} else {

				foreach ($this->input->post() as $key => $value) {
					
					$validation['messages'][$key] = form_error($key);
				}					
			}		


		} else {

			redirect('sap');
		}

	}

	public function show(){


	}

	public function edit(){


	}

	public function update(){


	}

	public function destroy(){

		
	}

	/**
		Added private Function
	**/

	private function getBirtDate($date_string){

		$converted_date = NULL;

		if ($date_string != '00000000' && $date_string) {
			
			$year =  substr($date_string,0,4);
			$month = substr($date_string,4,2);
			$day = substr($date_string,6,2);

			$converted_date = $year."-".$month."-".$day;			

		}

		return $converted_date;
	}

	//end

    /**
		Test Dial
    **/

    public function call(){

    	if ($this->input->is_ajax_request()) {

    		if ($this->input->get('extension') && $this->input->get('number')) {
    			
    			$extension = $this->input->get('extension');
    			$number = $this->input->get('number');

    			if ($extension && $number) {
    				
    				$cmd = "C:".DIRECTORY_SEPARATOR."xampp".DIRECTORY_SEPARATOR."htdocs".DIRECTORY_SEPARATOR."weserve".DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR."Debug".DIRECTORY_SEPARATOR."oxe-tsapi-console.exe";

    				$generate_dial = shell_exec($cmd." ".$extension." ".$number);

    				if ($generate_dial) {
    					
		   				$validation['success'] = 'true';
		    			$validation['messages'] = $generate_dial;
		    			$validation['dial_message'] = 'Entered Number successfully Dialed!';

    				} else {

    					$validation['success'] = 'error';
    					$validation['messages'] = 'Failed on making Call';
    				}

    			} else {

    				$validation['success'] = 'false';
    				$validation['messages'] = 'Invalid number to dial';
    			}

    			
    			echo json_encode($validation);
    			
    			
    		}

    	} else {

    		redirect('sap');
    	}

    }	    
}