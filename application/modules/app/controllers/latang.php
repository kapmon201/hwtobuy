<?php
defined('BASEPATH')    or exit('No direct script access allowed');

include APPPATH . 'controllers/site_utils.php';
// class Latihan extends CI_Controller {
class Latang extends Site_utils
{
	public $strings = ["", ""];
	public $ints = [0, 0];
	public $arr;
	public $arr_multi = [[]];

	public function __construct()
	{
		parent::__construct();
		$this->__get_request();

		/*
		if(!$this->session->userdata('id_latuser')) : 

		endif; 

		*/



		$this->load->model('Latang_model'); // ,'latihan
		$this->load->library('My');
	}

	function __get_request()
	{
		$this->id_adadoksuser = $this->get_default_request('id_adadoksuser', '');
		$this->id_privilege = $this->get_default_request('id_privilege', '');
		$this->id_status = $this->get_default_request('id_status', '');
		$this->nip2 = $this->get_default_request('nip2', '');
		$this->nm_pegawai = $this->get_default_request('nm_pegawai', '');
		$this->tgl_expired = $this->get_default_request('tanggal', date('Ymd'));

		$this->mode_input = $this->get_default_request('mode_input', 'simpan');
		$this->value = $this->get_default_request('value', '');
		$this->objectname = $this->get_default_request('objectname', '');

		$this->mode_save = $this->get_default_request('mode_save', 'insert');
	}

	/*
	index
	
  */


	public function index()
	{
		$content['js'] = get_js_modules(array('nglatang'));
		/* $content['css'] = get_css_modules(array('index/index')); */
		$data['title'] = 'Latang';
		$data['user_login'] = null;
		$segment = $this->uri->segment(1);
		$data['content_banner'] = $this->load->view('content_banner/latihan', ['link' => $segment], true);
		$data['content'] = $this->load->view('latang_index', $content, true);;
		$this->load->view('backend_template_main', $data);


		/*
		if (!$this->session->userdata('ID_ADADOKSUSER')) :
			$this->session->set_flashdata('error', "Anda belum login.");
			redirect(base_url("app/user/login"));
			exit;
		endif;

		$data['user_login'] = $this->User_model->get_login(array('ID_ADADOKSUSER' => $this->session->userdata("ID_ADADOKSUSER")));
		$content["title"] = "Adadoks";	
		*/
	}
}
