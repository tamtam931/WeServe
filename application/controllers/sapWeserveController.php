<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class sapWeserveController extends CI_Controller
{
	

	public function __construct(){

		parent::__construct();
		$this->load->model('weserve_sap');


	}

	public function index(){

		if ($this->input->is_ajax_request()) {
			
			$params = $this->input->get('resource');

			if ($params) {
				
				$sap = $this->weserve_sap->all($params);

				if ($sap) {

					$data = $sap->getBody()->getContents();

				}

			}

		} else {

    		$this->load->view('header');
    		$this->load->view('sap/dashboard');
    		$this->load->view('footer');			
			
		}

		

	}

	public function create(){

		if ($this->input->is_ajax_request()) {
			
			

		}		
	}	

	public function store(){

		if ($this->input->is_ajax_request()) {
			


		}		
	}	

	public function show(){

		if ($this->input->is_ajax_request()) {
			


		}
	}

	public function edit(){

		if ($this->input->is_ajax_request()) {
			


		}

	}

	public function update(){

		if ($this->input->is_ajax_request()) {
			


		}

	}

	public function destroy(){


	}
				
}