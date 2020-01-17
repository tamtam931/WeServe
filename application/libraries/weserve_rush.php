<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
	WeServe RUSH Interface Integration
	Author: Ben Zarmaynine E. Obra
	Added: January 15, 2020

	Library designed to integrate RUSH Web Services for WeServe
**/

class weserve_rush {

	private $base_uri;
	private $headers;
	private $ws_method = '';

	function __construct(){

		$this->base_uri = RUSH_WS;
		$this->headers = array("Content-type: text/xml","Accept: text/xml");

	}

	public function rushPOST($method,$body){

		if ($method && $body) {

			/*
				Iniatialization of necessary varibales
			*/
			$soapAction = 'SOAPAction: '.RUSH_SOAPACTION.$method;
			$this->ws_method = $method;

			array_push($this->headers, $soapAction);

			return $this->xmlResponse($body);


		} else {

			return false;
		}

	}

	private function xmlResponse($body){

		if (is_array($body) && $body) {
			
			$xml = new SimpleXMLElement('<REQST_PART_DTL/>');
			$body_params = $this->array_to_xml($body,$xml);

			if ($body_params) {

				$totalResponse = $this->totalResponse($body_params);

				/*
					Create RUSH Ticket
				*/


				$rush_ticket = $this->SOAPinit($totalResponse);

				if ($rush_ticket) {
					
					return $rush_ticket;
				}

			} else {

				return false;
			}
	

		} else {

			return false;
		}

	}

	private function SOAPinit($body){

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_TIMEOUT, 120);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($ch, CURLOPT_URL, $this->base_uri);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
		curl_setopt($ch, CURLOPT_POST, 1);

       
		$httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE); // this results 0 every time

		$responseBody = curl_exec($ch);

		$responseInfo = curl_getinfo($ch);
		curl_close($ch);       

		$ticket_num = strip_tags($responseBody,'');


		return $ticket_num;

	}

	private function totalResponse($request_dtl){

		if ($request_dtl) {
			
			$xmlResponse = '<?xml version="1.0" encoding="utf-8"?>
			<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
				<soap:Header>
					<AuthHeader xmlns="http://tempuri.org/RushWebService/RUSHWS">
						<SystemID>7</SystemID>
					</AuthHeader>
				</soap:Header>
               <soap:Body>
                  <'.$this->ws_method.' xmlns="http://tempuri.org/RushWebService/RUSHWS">
                    <xmlString>
                       <![CDATA[
                       <NewDataSet>
                        <REQST_MAST>
                           <REQST_CD>'.RUSH_WESERVE_REQST_CD.'</REQST_CD>                
                           <REQSTER>'.user('rush_id').'</REQSTER>
                           <WFLOW_CD>'.RUSH_WESERVE_WFLOW_CD.'</WFLOW_CD>   
                           <RMK /><MO_REQST_NUM />
                        </REQST_MAST>
                        <REQST_PART>
                            <PART_CD>'.RUSH_WESERVE_PART_CD.'</PART_CD>                            
                            <LINE_NUM>1</LINE_NUM>
                            <REQD_DT>'. date("m-d-Y") .'</REQD_DT>    
                            <RMK />
                        </REQST_PART>'.$request_dtl.'
                        </NewDataSet>]]>
                    </xmlString>
                </'.$this->ws_method.'>
            </soap:Body>
        </soap:Envelope>';

		} else {

			return false;
		}
		
		return $xmlResponse;
	}

	/*
		Array to PHP converter
		Reference link: https://stackoverflow.com/questions/37618094/php-convert-array-to-xml	 
	*/

	function array_to_xml($array, $xml) {

		$output = false;

	    foreach($array as $key => $value) { 

	        if(is_array($value)) {   

	            if(!is_numeric($key)){

	                $subnode = $xml->addChild($key);
	                array_to_xml($value, $subnode);

	            } else {

	                array_to_xml($value, $subnode);

	            }

	        } else {

	            $xml->addChild($key, $value);
	        }
	    }

		$dom = dom_import_simplexml($xml);
		
		if ($dom) {
			
			$output = $dom->ownerDocument->saveXML($dom->ownerDocument->documentElement);
		}

		return $output;    

	}		


}