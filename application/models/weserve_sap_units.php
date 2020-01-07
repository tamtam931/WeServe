<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class weserve_sap_units extends MY_Model {

	public $table = 'tbl_units';
	public $primary_key = 'id';

	function __construct(){

		$this->return_as = 'array';
		$this->timestamps = TRUE;

		parent::__construct();

	}
	

}