<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_utils extends MX_Controller {

	function __construct(){
		parent::__construct();
	}

	/*
	 * nama fungsi : _get_json_input
	 * description : mendapatkan hasil inputan json dari format request json
	 */
	function _get_json_input(){
		try{
			$data = json_decode(file_get_contents('php://input'), true);
			return $data;
		}catch(Exception $e){
			$this->_set_error_result($e->getMessage());
		}
	}

	/*
	 * nama fungsi : _set_error_result
	 * description : force display to error message
	 */
	function _set_error_result($message, $kode=400){
		$response = array(
			'type' => 'error',
			'msg' => $message,
		);
		$this->_build_error_result($response, $kode);
	}

	/*
	 * nama fungsi : _set_error_result
	 * description : generate output error
	 */
	function _build_error_result($response, $mode=''){
		$kode_header = ($mode!=='') ? $mode : 500;
		$this->output
			 ->set_header("Access-Control-Allow-Origin: *")
			 ->set_header("Access-Control-Expose-Headers: Access-Control-Allow-Origin")
			 ->set_status_header($kode_header)
			 ->set_content_type('application/json')
			 ->set_output($response['msg']);
	}

	function _set_output_format($format){
		$format_array = array('json', 'format');
		try{
			if(array_key_exists(strtolower($format), $format_array)){
				$this->default_format = $format;
			}else{
				throw new Exception("Error, format output tidak sesuai");
			}
		}catch(Exception $e){
			$this->_set_error_result($e->getMessage(), 403);
		}
	}

	/*
	 * nama fungsi : _build_result
	 * description : generate output
	 */
	function _build_result($response, $search_type='', $mode='', $output_mode=''){

		/* 
		 *	- kode_header
		 *		* 200 : Oke
		 *		* 201 : Inserted
		 *		* 204 : No Content
		 *		* 400 : Bad Request
		 *		* 401 : Unauthorized
		 *		* 403 : Forbiden
		 *		* 404 : Not Found
		 *		* 505 : Error Source Code
		*/

		/*
		 *  - output_mode
		*		* 1 : plain
		*		* 2 : json
		*		* 3 : xml
		*/

		$kode_header = ($mode!=='') ? $mode : 200;
		switch (strtolower($output_mode)) {
			case 'plain':
				echo $response;
				break;
			default:
				$data['response']  = $response;
				$this->output
					 ->set_header("Access-Control-Allow-Origin: *")
					 ->set_header("Access-Control-Expose-Headers: Access-Control-Allow-Origin")
					 ->set_status_header($kode_header)
					 ->set_content_type('application/json')
					 ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
				break;
		}
	}

	/*
	 * nama fungsi : get_default_request
	 * description : untuk mendapatkan nilai default dari parameter jika tidak terisi
	 */
	function get_default_request($parameter, $return=''){
		return ($this->input->get_post($parameter)) ? $this->input->get_post($parameter) : $return;
	}

	/*
	 * nama fungsi : check_islogin
	 * description : untuk mendapatkan nilai default dari parameter jika tidak terisi
	 */
	function check_islogin(){
		$this->check_ismaintenance();
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in !== true){
			$pesan = notification_message('login_first');
			$this->session->set_flashdata('error', $pesan['message']);
			$this->session->set_flashdata('header', $pesan['header']);
			redirect(base_url().'iri/auth');
		}
		return false;
	}

	function check_system_lock($nama_module='', $check_date=''){
		try{
			if($this->session->userdata('IS_ADMIN')){
				if(_ADMIN_FORCE){
					return true;
				}else{
					throw new Exception("Saat Ini Proses Input Output Sudah Terkunci.\nHubungi Administrator", 1);
				}
			}else{
				$this->load->model('admin/system_lock_model');
				$query = $this->system_lock_model->get_data($nama_module, 1, $check_date);
				if(count($query) > 0){
					return true;
				}else{
					throw new Exception("Saat Ini Proses Input Output Sudah Terkunci.\nHubungi Administrator", 1);
				}
			}
		}catch(Exception $e){
			$response = array(
				'type' => 'error',
				'msg' => $e->getMessage()
			);
			$this->_build_error_result($response, 500);
			die($e->getMessage());
		}
	}

	/*
	 * nama fungsi : check_ismaintenance
	 * description : untuk menginisialisasi keadaan website dalam posisi under maintenance
	 */
	function check_ismaintenance(){
		$is_maintenance = _MAINTENANCE;
		if($is_maintenance){
			redirect(base_url().'maintenance');
		}
		return false;
	}

	/*
	 * nama fungsi : check_isadmin
	 * description : untuk mendapatkan nilai default dari parameter jika tidak terisi
	 */
	function check_isadmin(){
		$is_admin = $this->session->userdata('IS_ADMIN');
		if(!isset($is_admin) && $is_admin !== '0'){
			$pesan = notification_message('permision_deny');
			$this->session->set_flashdata('error', $pesan['message']);
			$this->session->set_flashdata('header', $pesan['header']);
			redirect(base_url().'auth');
		}
		return false;
	}
}

/* End of file site_utils.php */
/* Location: ./application/controllers/site_utils.php */