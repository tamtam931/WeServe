<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
	WeServe Guzzle Integration
	Author: Ben Zarmaynine E. Obra
	Added: November 27, 2019

	Library designed to integrate SAP API to WeServe using Guzzle Http
**/

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Exception\ClientException;

class weserve_guzzle {

	private $base_uri = SAP_HOST.SAP_BASE_URI;
	private $client = null;

	private $auth_username;
	private $auth_password;
	private $auth_session_cookie;

	private $jar;

	function __construct($credentials){


		$this->auth_session_cookie = $credentials['authentication'];

		$this->client = new Client();
		$this->jar = new CookieJar();
		
		$this->CI =& get_instance();


	}

	public function weserve_sap_get($resource){

		//$sap_auth = $this->weserve_sap_auth($resource);

		$session_cookie = unserialize($this->auth_session_cookie['auth_cookie']);

		if ($session_cookie) {

			$test_array = [
				$session_cookie[0]['Name'] => $session_cookie[0]['Value'],
				$session_cookie[1]['Name'] => $session_cookie[1]['Value']
			];

			$user_cookie = $this->jar->fromArray($test_array,$session_cookie[0]['Domain']);
			$url = $this->base_uri.$resource;

			try {
				
				$response = $this->client->get($url, ['headers' => ['Accept' => 'application/json'],'cookies' => $user_cookie]);

				$statusCode = $response->getStatusCode();

				$returnStatus = $this->statusCode($statusCode);

				if ($returnStatus) {

					return $response->getBody()->getContents();

				} else {

					$validation['status'] = $statusCode;
					$validation['phrase'] = $response->getReasonPhrase();

					return $validation;
				}

			} catch (ClientException $e) {

		    	/*
					Update session cookie on DB if current data is expired
					Author: Ben Zarmaynine E. Obra
					Date: 01-07-20
		    	*/

				$url = $this->base_uri.$resource;

		    	$credentials = [
		    		$this->auth_session_cookie['auth_username'],
		    		$this->auth_session_cookie['auth_password']
		    	];

		    	set_time_limit(0);

		    	$response = $this->client->get($url, ['auth' => $credentials,'headers' => ['Accept' => 'application/json'],'cookies' => $this->jar]);		    	


				$update_cookie = $this->CI->weserve_sap_config->update(['id' => $this->auth_session_cookie['id']],['auth_cookie' => serialize($this->jar->toArray())]);


				if ($update_cookie) {
					
					set_time_limit(30);

					$statusCode = $response->getStatusCode();

					$returnStatus = $this->statusCode($statusCode);

					if ($returnStatus) {

						return $response->getBody()->getContents();

					} else {

						$validation['status'] = $statusCode;
						$validation['phrase'] = $response->getReasonPhrase();

						return $validation;
					}

				}
				//End

			}



		} else {

			return false;
		}

		

	}	


	private function weserve_sap_auth($resource){

		try {
			
			$url = $this->base_uri.$resource;

			$credentials = [
				$this->auth_username,
				$this->auth_password
			];

			$sessions = count($this->jar);

			if ($sessions) {
				

				$response = $this->client->get($url, ['cookies' => $this->jar]);

			} else {

				$response = $this->client->get($url, ['auth' => $credentials,'cookies' => $this->jar]);
			}
			
			
			$statusCode = $response->getStatusCode();

			$returnStatus = $this->statusCode($statusCode);
			
			if ($returnStatus) {

				return $this->jar;

			}

			return false;			


		} catch (ClientException $e) {

			return false;
			
		}

	}

	private function statusCode($statusCode){

		if ($statusCode) {
			
			if ($statusCode == 200 || $statusCode == 201) {
				
				
				return true;
				

			} else {

				return false;
			}

		} else {


			return false;
		}

	}	


}