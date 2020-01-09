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
        $this->load->model('weserve_sap_units');

	}

	public function index(){

		if ($this->input->is_ajax_request()) {
			

			$units = $this->weserve_sap_units->get_all();
			$data = array('list' =>  $units);

			$this->load->view('sap/unit/list',$data);


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

	public function create(){

		if ($this->input->is_ajax_request()) {
			
			$this->load->view('sap/unit/add');

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

				$ctr = 983;

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
							
		    				$_POST['company_code'] = $assoc_resource[$i]['BUKRS'];
		    				$_POST['project'] = $assoc_resource[$i]['SWENR'];
		    				$_POST['runitid'] = $assoc_resource[$i]['SMENR'];
		    				$_POST['unit_type'] = $assoc_resource[$i]['UNIT_TYPE']['HOMTYP'];

		    				/*
								Unit and parking Checker
		    				*/
								$UnitParkingValue = $assoc_resource[$i]['UNIT_TYPE']['ZZSALES_UNIT_TYPE']['UNIT_TYPE_CODE'];

								if ($UnitParkingValue == 'UN') {
									
									$_POST['unit_number'] = $assoc_resource[$i]['REFNO'];

								} else if($UnitParkingValue == 'PK'){

									$_POST['parking_number'] = $assoc_resource[$i]['REFNO'];

								} else if ($UnitParkingValue == 'UP') {
									
									$_POST['unit_number'] = $assoc_resource[$i]['REFNO'];

								} else {

									$_POST['unit_number'] = null;
									$_POST['parking_number'] = null;

								}

							//End
							$_POST['unit_area'] = $assoc_resource[$i]['TURNOVER_DATE']['UNIT_AREA'];

							$unit_status = $assoc_resource[$i]['STATUS']['TEXT'];
							$_POST['unit_status'] = $unit_status;

							$occ_per_date = $assoc_resource[$i]['TURNOVER_DATE']['OCC_PER_DATE'];
							$_POST['unit_occupancy_date'] = ($occ_per_date != '00000000' ? date("Y-m-d",strtotime($occ_per_date)) : null);
							
							$_POST['status'] = (($occ_per_date != '00000000' && ($unit_status == 'OPEN' || $unit_status == 'SOLD')) ? 5 : 1);


							$add = $this->weserve_sap_units->insert($this->input->post());							

						}

						$ctr++;

					} else {

						$validation['success'] = 'true';
						$validation['messages']['messagebox'] = 'Unit fetching data finished!';
						$validation['key'] = 'addUnit';
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

		if ($this->input->is_ajax_request()) {
			

		} else {

			redirect('weserve');
		}
		
	}
						    

}