<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class weserve_status extends MY_Model {

	public $table = 'tbl_dashboard_status';
	public $primary_key = 'id';

	function __construct(){

		$this->return_as = 'array';
		$this->timestamps = TRUE;

		parent::__construct();
	}


}