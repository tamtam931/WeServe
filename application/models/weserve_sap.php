<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class weserve_sap extends CI_Model {

	private $where_activated = array('deleted_at' => NULL); 

	function __construct(){

		parent::__construct();
		$this->load->model('weserve_sap_config');

	}

	public function all($resource,$paginate=null){

		if ($resource) {

			if ($paginate) {
				
				$main_resource = $resource."?page=".$paginate['index']."&limit=".$paginate['limit'];

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


	public function find($params){



	}


	public function save(){


	}

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


}