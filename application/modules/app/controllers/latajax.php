<?php

defined('BASEPATH')	OR exit('No direct script access allowed');

include APPPATH . 'controllers/site_utils.php';
// class Latihan extends CI_Controller {
class Latajax extends Site_utils {
	public $strings=["",""]; 
	public $ints=[0,0]; 
	public $arr; 
	public $arr_multi=[[]];  

	public function __construct() 
	{ 
		parent::__construct(); 
		$this->__get_request();
		
		// if(!$this->session->userdata('id_latuser')) : 
			
		// endif; 

		$this->load->model('Latihan_model'); // ,'latihan
		$this->load->library('My');  				
	}

	function __get_request(){		
		$this->mode_save = $this->get_default_request('mode_save', 'insert');
	}

	/*
	rohi_ajaxsatu 
	rohi_ajaxsatuproc
	rohi_ajaxdua 
	rohi_ajaxduaproc 
	rohi_ajaxtiga 
	rohi_ajaxtigaproc 
	
    */

	
	public function rohi_ajaxsatu() {
		$this->load->view('rohi_ajaxsatu'); 
	}

    public function rohi_ajaxsatuproc() {        
        echo $_GET['count']+1; 
	}

	public function rohi_ajaxdua() {
		$this->load->view('rohi_ajaxdua'); 
	}

	public function rohi_ajaxduaproc() {        
        echo "npm : ".$_POST["npm"]."<br>nama: ".$_POST['nama'];

	}

	public function rohi_ajaxtiga() {
		$this->load->view('rohi_ajaxtiga'); 
	}

	public function rohi_ajaxtigaproc() {                
		$mysqli = mysqli_connect("localhost","root","","wpu"); 
		$mahasiswa = array(); 
		$query = mysqli_query($mysqli,"select * from ajax_mahasiswa"); 
		while ($arr = mysqli_fetch_assoc($query)) : 
			$mahasiswa[] = $arr; 
		endwhile; 

		echo json_encode($mahasiswa); 
	}

}