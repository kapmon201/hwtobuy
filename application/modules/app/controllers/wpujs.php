<?php
defined('BASEPATH')	or exit('No direct script access allowed');

include APPPATH . 'controllers/site_utils.php';
// class Latihan extends CI_Controller {
class Wpujs extends Site_utils
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
	js18 
	wpujs23
	*/

	public function wpujs18()
	{
		$content = null;
		$data['content_banner'] = $this->load->view('content_banner/latihan', null, true);
		$data['content'] = $this->load->view('wpujs18', $content, true);
		$this->load->view('backend_template_latihan', $data);
	}

	public function js23()
	{
		$content["user_login"] = null;
		$data['content_banner'] = $this->load->view('content_banner/latihan', null, true);
		$data['content'] = $this->load->view('wpujs23', $content, true);
		$this->load->view('backend_template_main', $data);
	}


	public function wpujslat()
	{
		$content = null;
		$data['content_banner'] = $this->load->view('content_banner/latihan', null, true);
		$data['content'] = $this->load->view('wpujslat', $content, true);
		$this->load->view('backend_template_latihan', $data);
	}

	public function js26()
	{
		$content = null;
		$content["user_login"] = null;
		$data['content_banner'] = $this->load->view('content_banner/latihan', null, true);
		$data['content'] = $this->load->view('wpujs26', $content, true);
		$this->load->view('backend_template_main', $data);
	}

	public function js27()
	{
		$content = null;
		$content["user_login"] = null;
		$data['content_banner'] = $this->load->view('content_banner/latihan', null, true);
		$data['content'] = $this->load->view('wpujs27', $content, true);
		$this->load->view('backend_template_main', $data);
	}
}
