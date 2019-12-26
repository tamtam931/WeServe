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

			$weserve_sap = $this->weserveSAPinit([

				'cookies' => $config['auth_cookie'],
				'resource' => $main_resource

			]);

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

	

	public function generateUnitAttributes($unit_obj){

		if ($unit_obj) {
			
			$unit_id = $unit_obj->BUKRS;
			$status = (array) $unit_obj->STATUS;
			$turnover = (array) $unit_obj->TURNOVER_DATE;

			if (($status['TEXT'] == 'OPEN' || $status['TEXT'] == 'SOLD') && $turnover['QCD_TO_CEG']) {
				
				$this->attributes = '';

			} else {


			}


		}

		return $turnover;

	}

	//End

	/*
		Private function for Guzzle HTTP initialization
	*/

	private function weserveSAPinit($params){

		if ($params) {

			$config_cookie = unserialize($params['cookies']);
			$resource = $params['resource'];

			$this->load->library('weserve_guzzle',['cookie' => $config_cookie]);

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


}