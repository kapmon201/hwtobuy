<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Nama helper : Data Helper (base)
 * Deskripsi : wadah untuk helper yang berkaitan dengan data dengan database
 * 
 */

	/*
	 * nama fungsi : manual_sequence
	 * description : untuk menjalankan sequence secara manual dari codeigniter
	 */
	function manual_sequence($nama_sequence){
		try{
			$ci =& get_instance();
			$ci->load->database();
			$username = $ci->db->username;
			$password = $ci->db->password;
			$hostname = $ci->db->hostname;
			$char_set = $ci->db->char_set;
			$conn = oci_connect($username, $password, $hostname, $char_set);
			if (!$conn) {
			    $e = oci_error();
			    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
			}
			$query = "SELECT ".$nama_sequence.".NEXTVAL FROM DUAL";
			$stid = oci_parse($conn, $query);
			oci_execute($stid);
			return oci_fetch_assoc($stid);
		}catch(Exception $e){
			return false;
		}
	}

	/*
	 * nama fungsi : oracle_pagination
	 * description : konstruktor untuk membentuk pagination di query sql
	 */
	function oracle_pagination($query='', $page_number='', $page_size=''){
		try{
			$ci =& get_instance();
			$page_size = (empty($page_size)) ? $ci->config->item('data_page_size') : $page_size;
			$page_number = (empty($page_number) || $page_number < 0) ? 1 : $page_number;

			$limit_1 = ($page_number * $page_size) + 1;
			$limit_2 = (($page_number-1) * $page_size) + 1;

			$sql = "SELECT *
					FROM (";
				$sql .= "SELECT 
							X_DATA.*, 
							ROWNUM as R_
						FROM (";
					$sql .= $query;
				$sql .= ") X_DATA ";
				$sql .= "WHERE ROWNUM < {$limit_1}";
			$sql .= ")";
			$sql .= " WHERE R_ >= {$limit_2}";

			return $sql;
		}catch(Exception $e){
			return false;
		}
	}

	/*
	 * nama fungsi : send_curl
	 * description : untuk melakukan kirim curl
	 * parameter : 
	 * $data = array(
			'url' => 'http://url.rshs.or.id',
			'header' => array(
				'key' => 'value header',
				'key2' => 'value header 2' 
			),
			'method' => 'post / put / delete'
		);
	 */
	function request_curl($data=array(), $verbose=1, $ssl_verify=0){
		try{
			if(!is_array($data)) throw new Exception("Error, Inputan Harus Berbentuk Array", 1);
		    $session = curl_init($data['url']);
		    curl_setopt($session, CURLOPT_URL, $data['url']);
		    if(array_key_exists('header', $data)){
		    	curl_setopt($session, CURLOPT_HTTPHEADER, $data['header']);
		    }

		    $curl_verbose = ($verbose==1) ? true : false;
	    	$curl_ssl_verify = ($ssl_verify==1) ? true : false;
	    	curl_setopt($session, CURLOPT_SSL_VERIFYPEER, $curl_ssl_verify);

		    if(array_key_exists('method', $data)){
			    switch($data['method']){
			        case 'POST':
			            curl_setopt($session, CURLOPT_POST, true );
			            curl_setopt($session, CURLOPT_POSTFIELDS, $data['variable']);
			            break;
			        case 'PUT':
			            curl_setopt($session, CURLOPT_CUSTOMREQUEST, "PUT");
			            curl_setopt($session, CURLOPT_POSTFIELDS, $data['variable']);
			            break;
			        case 'DELETE':
			            curl_setopt($session, CURLOPT_CUSTOMREQUEST, "DELETE");
			            curl_setopt($session, CURLOPT_POSTFIELDS, $data['variable']);
			            break;
			    }
		    }
		    curl_setopt($session, CURLOPT_RETURNTRANSFER, TRUE);
		    curl_setopt($session, CURLOPT_VERBOSE, $curl_verbose);
		    if($curl_verbose){
			    $verbose_file = fopen(dirname(__FILE__).'/curl_logs.txt', 'w');
				curl_setopt($session, CURLOPT_STDERR, $verbose_file);
		    }
		    $response = curl_exec($session);
		    return $response;
		}catch(Exception $e){
			die($e);
		}
	}