<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH.'controllers/site_utils.php';
class Api_component extends Site_utils {

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		header_remove();
		//$this->load->model('api_component_model');
		$this->secure_mode = 0;
		$this->_get_request();
	}

	function _get_request(){
		$this->id = $this->input->get_post('id');
		$this->timestamp = ($this->input->get_post('timestamp')) ? $this->input->get_post('timestamp') : time();
		$this->secret = $this->input->get_post('secret');
		$this->token = $this->input->get('_token');
	}

	function _get_request_method($config_method=''){
		$request_method = $_SERVER['REQUEST_METHOD'];
		$config_method = ($config_method!=='') ? $config_method : 'GET';
		try{
			if(strtolower($request_method) !== strtolower($config_method)) throw new Exception('Error, request method anda salah');
			return true;
		}catch(Exception $e){
			$this->_set_error_result($e->getMessage(), 405);
		}
	}

	function _get_json_input(){
		try{
			$data = json_decode(file_get_contents('php://input'), true);
			return $data;
		}catch(Exception $e){
			$this->_set_error_result($e->getMessage());
		}
	}

	function _get_xml_input(){
		try{
			$data = trim(file_get_contents('php://input'));
			$xml_data = simplexml_load_string($data);
			$result_data = json_decode(json_encode($xml_data), true);
			return $result_data;
		}catch(Exception $e){
			$this->_set_error_result($e->getMessage());
		}
	}

	function _set_secure(){
		return $this->secure_mode = 1;
	}
}