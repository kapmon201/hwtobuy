<?php

defined('BASEPATH')	OR exit('No direct script access allowed');

include APPPATH . 'controllers/site_utils.php';
// class Latihan extends CI_Controller {
class Latihan extends Site_utils {
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
	bootstrap_index 

	ajax_crudindex 
	ajax_crudget
	mbahcoding_index
	mbahcoding_ajaxlist
	*/

	public function bootstrap_index() {
		 
		$this->load->view('view_bootstrapblank');
	}

	public function ajax_crudindex() {
		$content["user_login"]=null;
		$content["title"]="Latihan";

		$data['content_banner'] = $this->load->view('content_banner/latihan', null, true);
		$data['content'] = $this->load->view('ajax_crudindex', $content, true);
		$this->load->view('backend_template_latihan', $data);	

		/*
		if($this->username) : 
			$arr = array('username' =>strtolower($this->username),);
			$content["lat_user"] = $this->User_model->get( $arr );			
		else : 
			$content["lat_user"] = $this->User_model->get();
		endif; 
		
		
		$this->load->view("templates/header",$data);
		$this->load->view("ajax_crudindex",$data); 
		$this->load->view("templates/footer"); 

		*/
	}	

	public function ajax_crudget() {
		$user = $this->Latihan_model->get(true); 
		unset($arr); 
		unset($ints); 
		$ints[0]=0; 
		foreach ($user as $user) : 
			$ints[0]+=1; 
			$row = array(); 

			$row[] = $ints[0]; 
			$row[] = $user['id_user']; 
			$row[] = $user['username']; 
			$row[] = "<a class='btn btn-sm btn-info text-white' onclick='editForm($user[ID_USER])'>Edit</a>"; 
			$arr = $row; 
			
			
		endforeach; 

		echo json_encode(array("data"=>$arr)); 



	}

	public function mbahcoding_index() {
		$this->load->view('mbahcoding_index'); // 
	}

    public function mbahcoding_ajaxlist()
    {
        $list = $this->Latihan_model->mbahcoding_getdatatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->FIRST_NAME;
            $row[] = $customers->LAST_NAME;
            $row[] = $customers->PHONE;
            $row[] = $customers->ADDRESS;
            $row[] = $customers->CITY;
            $row[] = $customers->COUNTRY;
 
            $data[] = $row;
        }
 
        $output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Latihan_model->mbahcoding_countall(),
			"recordsFiltered" => $this->Latihan_model->mbahcoding_countfiltered(),
			"data" => $data,
		);
        //output to json format
        echo json_encode($output);
    }

	/*
	public function checkbox_idstatus(){
		$data = array(
			'id_latuser' => $_POST['id_latuser'],
			'id_status' => $_POST['id_status'],
		);
		$update = $this->db->query("update lat_user set id_status=".$_POST['id_status']." where id_latuser='".$_POST['id_latuser']."'");

		$lat_user=$this->User_model->get( array("id_latuser"=>$_POST['id_latuser'],) );
		
		foreach ($lat_user as $lat_userext) : 

		endforeach; 

		if (count($lat_userext)>0) : 
			$response = true; 
		else : 
			$response = false ; 
		endif; 

		$response = array(
			'type' => $response == false ? 'warning' : 'success',
			'msg' => "memroses data an. ".$lat_userext["username"],			
			'data' => $response == false ? 'gagal' : 'berhasil',
			'ket' => $response,
		);
		echo json_encode($response);

		

	}

	public function combobox_idprivilege(){
		$data = array(
			'id_latuser' => str_replace("combobox_","",$_POST['id_latuser']),
			'id_privilege' => $_POST['id_privilege'],
		);
		$update = $this->db->query("update lat_user set id_privilege=".$data['id_privilege']." where id_latuser='".$data['id_latuser']."'");

		$lat_user=$this->User_model->get( array("id_latuser"=>$data['id_latuser'],) );
		
		foreach ($lat_user as $lat_userext) : 

		endforeach; 

		if (count($lat_userext)!=0) : 
			$response = true; 
		else : 
			$response = false ; 
		endif; 

		$response = array(
			'type' => $response == false ? 'warning' : 'success',
			'msg' => 'mengupdate privilege an. '.$lat_userext["username"].'. privilege saat ini menjadi: '.$lat_userext["id_privilege"],			
			'data' => $response == false ? 'gagal' : 'berhasil',
			'ket' => $response,
		);
		echo json_encode($response);

		

	}
	*/

		

		
		
			

	

}