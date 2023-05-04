<?php
defined('BASEPATH')	or exit('No direct script access allowed');

include APPPATH . 'controllers/site_utils.php';
// class Latihan extends CI_Controller {
class Wpurestapi extends Site_utils
{
	public $strings = ["", ""];
	public $ints = [0, 0];
	public $arr;
	public $arr_multi = [[]];

	public function __construct()
	{
		parent::__construct();
		$this->__get_request();

		// if(!$this->session->userdata('id_latuser')) : 

		// endif; 


	}

	function __get_request()
	{
		$this->mode_save = $this->get_default_request('mode_save', 'insert');
	}

	/*
	wpu_restapijsonpdo
	wpu_restapisatu 
	wpu_restapidua
	wpu_restapitiga
	igyoutube_index 

	f1 
	*/

	public function wpu_restapijsonpdo()
	{
		$this->load->view('wpu_restapijsonpdo');
	}

	public function wpu_restapisatu()
	{
		$this->load->view('wpu_restapisatu');
	}

	public function wpu_restapidua()
	{
		$this->load->view('wpu_restapidua');
	}

	public function wpu_restapitiga()
	{
		$this->load->view('wpu_restapitiga');
	}

	public function f1()
	{
		$this->load->view('wpurestapi1');
	}

	public function f2()
	{
		$this->load->view('wpurestapi2');
	}

	public function f3()
	{
		// akses json dng js 
		$this->load->view('wpurestapi3');
	}

	public function igyoutube_index()
	{
		$content = null;
		$data['content_banner'] = $this->load->view('content_banner/latihan', null, true);
		$data['content'] = $this->load->view('wpujs18', $content, true);
		$this->load->view('backend_template_latihan', $data);
	}
}
