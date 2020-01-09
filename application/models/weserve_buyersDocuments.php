<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class weserve_buyersDocuments extends MY_Model {

	public $table = 'tbl_buyers_documents';
	public $primary_key = 'id';

	function __construct(){

		$this->return_as = 'array';
		$this->timestamps = FALSE;

		parent::__construct();

	}
	

}