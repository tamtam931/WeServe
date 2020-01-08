<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class weserve_sap extends CI_Model {

	private $where_activated = array('deleted_at' => NULL); 
	private $sub_resource;
	private $attributes;

	function __construct(){

		parent::__construct();
		$this->sub_resource = false;
		$this->attributes = '';
		$this->load->model('weserve_sap_config');
		$this->load->model('weserve_status');

	}


	/*
		
		Custom functions: all custom functions outside parent model must be written here
		Added: 12-23-19
		Author: Ben Zarmaynine E. Obra
	
	*/

	public function all($resource,$params=null){

		if ($resource) {

			if ($params) {
				
				if ($params['type'] == 'paginate') {
					
					$main_resource = $resource."?page=".$params['index']."&limit=".$params['limit'];

				} else if ($params['type'] == 'GET') {
					
					$main_resource = $resource."?".$params['params']."=".$params['value'];

				} else {

					return false;
				}

			} else {

				$main_resource = $resource;
			}


			$raw = $this->weserve_sap_config->findOrfail($this->where_activated);
			$config = $raw[0];

			$weserve_sap = $this->weserveSAPinit($raw[0],$main_resource);

		}

		return $weserve_sap;

	}

	/*
		Public function to generate custom uri within specific endpoint
		uri sub_resource: Companies/{{ BUKRS }}/Towers/{{ SWENR }}/{{ Endpoint }}

		Wildcard variable: must contain arrays 'company_code' and 'project_code'
		Endpoint varibale: URI endpoint (GET and POST parameters is not allowed)
	*/
    public function CompanyProjectResource($endpoint=null,$wildcard){

        if ($endpoint) {
            
            if ($wildcard['company_code'] && $wildcard['project_code']) {
                
                $this->sub_resource = 'Companies/'.$wildcard["company_code"].'/Towers/'.$wildcard["project_code"].$endpoint;

            } 

        }

        return $this->sub_resource;
    }

    /*
		
    */

    public function SUpdate($resource,$body){

    	$weserve_sap = false;

    	if ($resource && $body) {
    		
    		$body_checker = count($body);

    		if ($body_checker > 0) {
    			
				$raw = $this->weserve_sap_config->findOrfail($this->where_activated);
				$config = $raw[0];

				$weserve_sap = $this->weserveSAPinit($raw[0],$main_resource,$body);

    		}

    		return $weserve_sap;

    	} else {

    		return false;
    	}

    }

    //End

	

	public function generateUnitAttributes($unit_obj){

		if ($unit_obj) {
			
			$unit_id = $unit_obj->BUKRS;
			$status = (array) $unit_obj->STATUS;
			$turnover = (array) $unit_obj->TURNOVER_DATE;

			if (($status['TEXT'] == 'OPEN' || $status['TEXT'] == 'SOLD') && $turnover['QCD_TO_CEG'] == '00000000') {
				
				$this->attributes = $this->weserve_status->where('color','#FFBF04')->get();

			} else if(($status['TEXT'] == 'OPEN' || $status['TEXT'] == 'SOLD') && $turnover['QCD_TO_CEG'] != '00000000' && ( $turnover['TURN_OVER_DATE'] != '00000000' || $turnover['OCC_PER_DATE'] != '00000000')) {

				$this->attributes = $this->weserve_status->where('color','#FE65E1')->get();

			} else if(($status['TEXT'] == 'OPEN' || $status['TEXT'] == 'SOLD') && $turnover['OOMCACCEPT_DATE'] != '00000000' && ( $turnover['TURN_OVER_DATE'] != '00000000' || $turnover['OCC_PER_DATE'] != '00000000')){ 

				$this->attributes = $this->weserve_status->where('color','#EEFDA2')->get();

			} else if (($status['TEXT'] == 'OPEN' || $status['TEXT'] == 'SOLD') && $turnover['OCC_PER_DATE'] != '00000000') {
				
				$this->attributes = $this->weserve_status->where('color','#D2B0CC')->get();

			} else if(($status['TEXT'] == 'OPEN' || $status['TEXT'] == 'SOLD') && $turnover['TURN_OVER_DATE'] != '00000000'){

				$this->attributes = $this->weserve_status->where('color','#F6CF8C')->get();

			} 


		}

		return $this->attributes;

	}

	//End

	/*
		Private function for Guzzle HTTP initialization GET
	*/

	private function weserveSAPinit($params,$resource){

		if ($params && $resource) {

			$this->load->library('weserve_guzzle',['authentication' => $params]);

			$data = $this->weserve_guzzle->weserve_sap_get($resource);

			if (isset($data['status'])) {

				return false;

			} else {

				return $data;
			}

		} else {

			return false;
		}
	}		

	//End

	/*
		Private function for Guzzle HTTP initialization POST
	*/

	private function weserveSAPinitPOST($params,$resource,$body){

		if ($params && $resource) {

			$this->load->library('weserve_guzzle',['authentication' => $params]);

			$data = $this->weserve_guzzle->weserve_sap_put($resource,$body);

			if ($data['status']) {

				return $data;

			} else {

				return false;
			}

		} else {

			return false;
		}
	}		

	//End			


}