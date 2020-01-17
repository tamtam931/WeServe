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

	private $base_uri;
	private $sapClient;
	private $client = null;

	private $auth_session_cookie;
	private $jar;

	function __construct($credentials){


		$this->auth_session_cookie = $credentials['authentication'];
		$this->base_uri = $credentials['authentication']['sap_domain'].$credentials['authentication']['sap_base'];
		$this->sapClient = $credentials['authentication']['sap_client'];

		$this->client = new Client();
		$this->jar = new CookieJar();
		
		$this->CI =& get_instance();


	}

	public function weserve_sap_get($resource,$token=false){

		$url = $this->base_uri.$resource;

		$session_cookie = unserialize($this->auth_session_cookie['auth_cookie']);

		if ($session_cookie) {

			$test_array = [
				$session_cookie[0]['Name'] => $session_cookie[0]['Value'],
				$session_cookie[1]['Name'] => $session_cookie[1]['Value']
			];

			$user_cookie = $this->jar->fromArray($test_array,$session_cookie[0]['Domain']);
			

			try {
				
				if ($token) {
					
					$response = $this->client->get($url, ['headers' => ['Accept' => 'application/json','x-csrf-token' => 'fetch', 'sap-client' => $this->sapClient],'cookies' => $user_cookie]);

				} else {

					$response = $this->client->get($url, ['headers' => ['Accept' => 'application/json', 'sap-client' => $this->sapClient],'cookies' => $user_cookie]);
				}

				$statusCode = $response->getStatusCode();

				$returnStatus = $this->statusCode($statusCode);

				if ($returnStatus) {

					return ($token ? $response->getHeaders() : $response->getBody()->getContents());

				} else {

					$validation['status'] = $statusCode;
					$validation['phrase'] = $response->getReasonPhrase();

					return $validation;
				}

			} catch (ClientException $e) {

				$exceptionResult = $e->getResponse();

				if ($exceptionResult->getStatusCode() == 401) {
					
			    	$credentials = [
			    		$this->auth_session_cookie['auth_username'],
			    		$this->auth_session_cookie['auth_password']
			    	];

			    	$csrf = ($token ? true : false);

			    	/*
						Update session cookie on DB if current data is expired
						Author: Ben Zarmaynine E. Obra
						Date: 01-07-20
			    	*/

					$this->weserve_sap_auth($url,$credentials,$csrf);

					//End

				} else {

					$exceptionResult = $e->getResponse();

					$statusCode = $exceptionResult->getStatusCode();

					$returnStatus = $this->statusCode($statusCode);

					$validation['status'] = $statusCode;
					$validation['phrase'] = $exceptionResult->getReasonPhrase();				

					return $validation;
				}

			}


		} else {

	    	$credentials = [
	    		$this->auth_session_cookie['auth_username'],
	    		$this->auth_session_cookie['auth_password']
	    	];

	    	$csrf = ($token ? true : false);

	    	$this->weserve_sap_auth($url,$credentials,$csrf);
		}

		

	}

	public function weserve_sap_put($resource,$headers){

		if ($resource && $headers['endpoint'] && $headers['body']) {

				$init_resource = $this->base_uri.$resource;

				/*
					Get SAP Token for PUT method using initial resource ('$resource')
				*/
				$find = $this->weserve_sap_get($resource,true);
				$csrf = $find['x-csrf-token'][0];
				//End

				$session_cookie = unserialize($this->auth_session_cookie['auth_cookie']);

				$test_array = [
					$session_cookie[0]['Name'] => $session_cookie[0]['Value'],
					$session_cookie[1]['Name'] => $session_cookie[1]['Value']
				];

				$user_cookie = $this->jar->fromArray($test_array,$session_cookie[0]['Domain']);				
				
				/*
					if csrf found on initial resource ('$resource') add the instance of '$endpoint' parameter to
					declare the main url
				
				*/

				$url = ($csrf ? $init_resource.$headers['endpoint'] : $this->base_uri);
					
				//End

				/*
					PUT request initialization for specified resource
				
				*/

				$response = $this->client->put($url, [
					'headers' => [
						'Accept' => 'application/json',
						'x-csrf-token' => $csrf,
						'Content-Type' => 'application/json'
					],
					'body' => json_encode($headers['body']),
					'cookies' => $user_cookie
				]);

				//End

				$statusCode = $response->getStatusCode();

				$returnStatus = $this->statusCode($statusCode);

				$validation['phrase'] = $response->getReasonPhrase();

				if ($returnStatus) {
					
					$validation['status'] = $statusCode;
					
				} else {

					$validation['status'] = false;
				}	

			return $validation;

		} else {

			return false;
		}

	}	


	/*
		Private function for class transactions
	*/
	private function weserve_sap_auth($resource,$credentials,$csrf){

		if ($resource && $credentials) {

			set_time_limit(0);

			try {

				if ($csrf) {
					
					$response = $this->client->get($resource, ['auth' => $credentials,'headers' => ['Accept' => 'application/json','x-csrf-token' => 'fetch', 'sap-client' => $this->sapClient],'cookies' => $this->jar]);

				} else {

					$response = $this->client->get($resource, ['auth' => $credentials,'headers' => ['Accept' => 'application/json', 'sap-client' => $this->sapClient],'cookies' => $this->jar]);
				}

				$update_cookie = $this->CI->weserve_sap_config->update(['id' => $this->auth_session_cookie['id']],['auth_cookie' => serialize($this->jar->toArray())]);

				if ($update_cookie) {
					
					set_time_limit(30);

					$statusCode = $response->getStatusCode();

					$returnStatus = $this->statusCode($statusCode);

					if ($returnStatus) {

						return ($csrf ? $response->getHeaders() : $response->getBody()->getContents());

					} else {

						$validation['status'] = $statusCode;
						$validation['phrase'] = $response->getReasonPhrase();

						return $validation;
					}

				}

			} catch (ClientException $e) {
				
				return false;
			}			
			
		} else {

			set_time_limit(30);
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
	//End	


}