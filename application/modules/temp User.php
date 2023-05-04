<?php
defined('BASEPATH')	OR exit('No direct script access allowed');

include APPPATH . 'controllers/site_utils.php';
// class Latihan extends CI_Controller {
class User extends Site_utils {
	public $strings=["",""]; 
	public $ints=[0,0]; 
	public $arr; 
	public $arr_multi=[[]];  

	/*
	__construct()
	__get_request 

	*/

	public function __construct() 
	{ 
		parent::__construct(); 
		$this->__get_request();
		
		// if(!$this->session->userdata('nip')) : 
			
		// endif; 
		
		$this->load->model('User_model');
		$this->load->model('App_model'); 		
		$this->load->library('My');  
				
	}

	function __get_request(){
		$this->id_adadoksuser = $this->get_default_request('id_adadoksuser',''); // = nip 
		// $this->nip = $this->get_default_request('nip',''); 
		$this->password = $this->get_default_request('password',''); 
		$this->id_privilege = $this->get_default_request('id_privilege',''); 
		$this->id_status = $this->get_default_request('id_status',''); 
		$this->id_inserter = $this->get_default_request('id_inserter',''); 
		$this->id_updater = $this->get_default_request('id_updater',''); 

		$this->mode_save = $this->get_default_request('mode_save', 'insert');
	}

	function index(){
		// utk ambil data user sedang login 
		$data['user_login']=$this->User_model->get_login(array('id_adadoksuser'=>$this->session->userdata("id_adadoksuser"))); 
		
		//$content['user'] = array();
		$content['css'] = get_css_modules(['auth/auth_index']);
		$content['js'] = get_js_modules(['auth/auth_index']);

		$content['user'] = $this->User_model->get();
		
		unset($arr);
		$arr=array(
		'autocomplete'	=> "off", 
		'autofocus'		=> "autofocus",
     	'class'         => "form-control input-sm",
     	'id'            => "cari",
     	'minlength'		=> "4", 
     	'maxlength'		=> "32",                          
     	'name'          => "cari",
     	//'pattern'=>"[0-9]{16}", 	        	
     	'placeholder'	=> "Masukkan NIP/Nama",
     	'required'		=> 'required',	        		        	 
     	'size'          => '20' , // 20 
     	//'tabindex'		=> 0 ,	
     	'title' 		=> "Masukkan NIP/Nama",
     	'value'			=> null 
    	);
		$content["cari"]="<div class=\"form-group\"><label for=\"cari\">Cari dengan NIP/Nama</label>".form_input($arr)."<small class=\"form-text text-danger\">".form_error("cari")."</small></div>"; 

		unset($ints); 
		$ints[0]=1; 
		$content["bil"]=$ints[0]; 

		$data['content_banner'] = $this->load->view('content_banner/admin', null, true);
		$data['content'] = $this->load->view('user_index', $content, true);
		$this->load->view('backend_template_main', $data);
	}

	function login()
	{
		$content['css'] = get_css_modules(['auth/auth_index']);
		$content['js'] = get_js_modules(['auth/auth_index']);
		/*
		$content['data'] = $this->User_model->get_data();
		*/

		unset($arr); 		
		$arr = array('tgl_login' =>'');
		$content["form_open"]=form_open('app/user/login_proc', '', $arr);

		unset($arr);
		$arr=array(
		'autocomplete'	=> "off", 
		'autofocus'		=> "autofocus",
    	'class'         => "form-control input-sm",
    	'id'            => "id_adadoksuser",
    	'minlength'		=> "8", 
    	'maxlength'		=> "18",                          
    	'name'          => "id_adadoksuser",
    	//'pattern'=>"[0-9]{16}", 	        	
    	'placeholder'	=> "Masukkan NIP atau Inisial Anda",
    	'required'		=> 'required',	        		        	 
    	'size'          => 0 , // 20 
    	'title' 		=> "NIP atau Inisial Anda",
    	'value'			=> null 
		);
		$content["id_adadoksuser"]="<tr><td><label for=\"nip\">NIP/Inisial</label></td><td>".form_input($arr).""."<small class=\"form-text text-danger\">".form_error("id_adadoksuser")."</small></td></tr>";

		unset($arr);
		$arr=array(
		'autocomplete'	=> "off", 
		'autofocus'		=> null,
    	'class'         => "form-control input-sm",
    	'id'            => "password",
    	'minlength'		=> "4",
    	'maxlength'		=> "32",                          
    	'name'          => "password",
    	//'pattern'		=> ".{8,}",  
    	'placeholder'	=> "Masukkan Password Anda",	
    	'required'		=> 'required', 	        	 	        	      	 
    	'size'          => 0 ,
    	'tabindex'		=> 0 ,	
    	'value'			=> null 
		);			
      	$content["password"]="<tr><td>".$this->my->get_labelfor($arr["id"])."</td><td>".form_password($arr)."".$this->my->get_formvalelement($arr["id"])."</td></tr>";
     
		$content["btn_submit"]=$this->my->get_btn_submit();
		$content["btn_reset"]=$this->my->get_btn_reset();
				
		$data['content_banner'] = $this->load->view('content_banner/user', null, true);
		$data['content'] = $this->load->view('login', $content, true);
		$this->load->view('backend_template_login', $data);			
	}

	public function login_proc() {
		try {
			$data = array(
				'id_adadoksuser' => $this->id_adadoksuser,
				'password' => md5($this->password),
			);
			$cari = $this->User_model->get_login($data);			

			// start 0: cek jika tidak ada data di tabel adadoks_user
			if(count($cari)<=0) throw new Exception("Anda belum diberi akses ke aplikasi.", 1);
					
			foreach ($cari as $temp_cari) : 

			endforeach; 

			if ($temp_cari->ID_STATUS==0) throw new Exception("Status user masih belum aktif untuk aplikasi.", 1);

			// buat session 
			unset($arr);
			$arr = array('id_adadoksuser' => $temp_cari->ID_ADADOKSUSER, 'id_privilege'	 => $temp_cari->ID_PRIVILEGE);	
			$this->session->set_userdata($arr); 
			redirect(base_url().'app/user');
			exit;					

		} catch(Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url().'app/user/login');
		}
	}

	public function logout(){	
		$this->session->unset_userdata('nip');
		$this->session->sess_destroy();
		redirect(base_url('app/user/login'));
	}

	public function insert(){
		// utk ambil data user sedang login 
		$data['user_login']=$this->User_model->get_login(array('id_adadoksuser'=>$this->session->userdata("id_adadoksuser")));  
		
		$content['css'] = get_css_modules(['auth/auth_index']);
		$content['js'] = get_js_modules(['auth/auth_index']);

		unset($arr); 		
		$arr = array('id_inserter' =>$this->session->userdata('id_adadoksuser'));
		$content["form_open"]=form_open('app/user/insert_proc', '', $arr);

		unset($arr);
		$arr=array(
		'autocomplete'	=> "off", 
		'autofocus'		=> "autofocus",
     	'class'         => "form-control input-sm",
     	'id'            => "id_adadoksuser",
     	'minlength'		=> "8", 
     	'maxlength'		=> "20",                          
     	'name'          => "id_adadoksuser",
     	//'pattern'=>"[0-9]{16}", 	        	
     	'placeholder'	=> "NIP",
     	'required'		=> 'required',         		        	 
     	'size'          => 0 , // 20 
     	'title' 		=> "Nomor Induk Pegawai (NIP)",
     	'value'			=> null 
	   );
		$content["id_adadoksuser"]="<tr><td><label for=\"id_adadoksuser\">NIP</label></td><td>".form_input($arr).""."<small class=\"form-text text-danger\">".form_error("id_adadoksuser")."</small></td></tr>";

		unset($arr); 
		$arr=array("btn_insert","btn_insert",1);
		$content["btn_submit"]=$this->my->get_btnsubmit($arr);

		unset($arr); 
		$arr=array("btn_reset","btn_reset",2);
		$content["btn_reset"]=$this->my->get_btnreset($arr);

		unset($arr); 
		$arr=["app/user","0","1","2"]; 		
		$content["link_back"]=$this->my->get_link($arr,true);
		
		$data['content_banner'] = $this->load->view('content_banner/admin', null, true);
		$data['content'] = $this->load->view('user_insert', $content, true);
		$this->load->view('backend_template_main', $data);
	}
		
	public function insert_proc(){
		
	}

	public function update($param=null){
		try {
			if (!$param) throw new Exception("NIP pegawai akan diedit, belum ditentukan.", 1);

			// cek nip @tbl adadoks_user. jika tidak ada throw exception 
			unset($arr); 
			$arr = array(
				'id_adadoksuser' => $param,
			);
			$adadoks_user = $this->User_model->get_adadoksuser($arr);
			
			if(count($adadoks_user)<=0) throw new Exception("Data user aplikasi dengan nip: ".$param." tidak ditemukan.", 1);

			// utk ambil data user sedang login 
			$data=array(
				'id_adadoksuser'=>$this->session->userdata("id_adadoksuser")
				); 
			$data['user_login']=$this->User_model->get_login($data);  		

			$content['css'] = get_css_modules(['auth/auth_index']);
			$content['js'] = get_js_modules(['auth/auth_index']);
		 	
		 	foreach ($adadoks_user as $temp_adadoksuser) : 

			endforeach; 

			unset($arr); 		
			$arr = array('id_adadoksuser'=>$temp_adadoksuser->ID_ADADOKSUSER, 'id_updater' =>$this->session->userdata('id_adadoksuser'));
			$content["form_open"]=form_open('app/user/update_proc', '', $arr);

			$content["id_adadoksuser"]="<tr><td>NIP</td><td>".$temp_adadoksuser->ID_ADADOKSUSER."</td></tr>"; 

			unset($strings);	
			unset($arr); 
			unset($ints); 
			$arr=array("99","0","1");
			$arr2=array("Pilih","Tidak Aktif","Aktif");  
			$strings[0]="<select class=\"form-control input-sm\" id=\"id_status\" name=\"id_status\" tabindex=\"2\">";
			for($ints[0] = 0; $ints[0] < count($arr); $ints[0]++) {
				$strings[0].="<option value=\"".$arr[$ints[0]]."\">".$arr2[$ints[0]]."</option>";				
			}
			$strings[0].="</select>"; 						
	    	$content["id_status"]="<tr><td><label for=\"id_status\">Status*</label></td><td>".$strings[0].""."<small class=\"form-text text-danger\">".form_error("id_status")."</small></td></tr>";

	    	unset($strings);	
			unset($arr); 
			unset($ints); 
			unset($arr2); 
			$arr=array("99","2","1");
			$arr2=array("Pilih","Operator","Admin"); 
			$strings[0]="<select class=\"form-control input-sm\" id=\"id_privilege\" name=\"id_privilege\" tabindex=\"2\">";
			for($ints[0] = 0; $ints[0] < count($arr); $ints[0]++) {
				$strings[0].="<option value=\"".$arr[$ints[0]]."\">".$arr2[$ints[0]]."</option>"; 
			}
			$strings[0].="</select>"; 						
	    	$content["id_privilege"]="<tr><td><label for=\"id_privilege\">Hak Akses*</label></td><td>".$strings[0].""."<small class=\"form-text text-danger\">".form_error("id_privilege")."</small></td></tr>";

	    	
			unset($arr); 
			$arr=array("btn_insert","btn_insert",1);
			$content["btn_submit"]=$this->my->get_btnsubmit($arr);

			unset($arr); 
			$arr=array("btn_reset","btn_reset",2);
			$content["btn_reset"]=$this->my->get_btnreset($arr);

			unset($arr); 
			$arr=["app/user","0","1","2"]; 		
			$content["link_back"]=$this->my->get_link($arr,true);

			$data['content_banner'] = $this->load->view('content_banner/admin', null, true);
			$data['content'] = $this->load->view('user_update', $content, true);
			$this->load->view('backend_template_main', $data);

		} catch(Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage()); 
			redirect(base_url().'app/user');
		}
	}
		
	public function update_proc(){
		try{
			$data = array(
			'ID_ADADOKSUSER' => $this->id_adadoksuser,
			'ID_PRIVILEGE' => intval($this->id_privilege),
			'ID_STATUS' => intval($this->id_status),
			'ID_UPDATER' => $this->id_updater,			
			);	

			$insert_data = $this->User_model->save($data, 'update');
			$this->session->set_flashdata('success', 'Data berhasil diupdate');
			redirect(base_url().'app/user');			
		}catch(Exception $e){
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url().'app/user');
		}	
	}	
	
	public function delete($param){
		try {

			if ( $param==null ) throw new Exception("NIP tidak diset.", 1);

			unset($arr); 
			$arr = array(
				'id_adadoksuser' => $param,
			);
			$content["adadoks_user"] = $this->User_model->get_adadoksuser($arr);
			
			if(count($content["adadoks_user"])<=0) throw new Exception("Tidak ada data user.", 1);

			$data['user']=$this->User_model->get_data(array('NIP'=>$this->session->userdata("id_adadoksuser"))); 		
			$content['css'] = get_css_modules(['auth/auth_index']);
			$content['js'] = get_js_modules(['auth/auth_index']);
		 	
		 	foreach ($content["adadoks_user"] as $temp_adadoksuser) : 

		 	endforeach; 

			unset($arr); 		
			$arr = array("id_adadoksuser"=>$temp_adadoksuser->ID_ADADOKSUSER,"id_status"=>"0",);
			$content["form_open"]=form_open('app/user/delete_proc', '', $arr);

			$content["btn_submit"]=$this->my->get_btn_submit(); 
			$content["btn_reset"]=$this->my->get_btn_reset();

			unset($arr); 
			$arr=["app/user","0","1","2"]; 		
			$content["link_back"]=$this->my->get_link($arr,true);

			$data['content_banner'] = $this->load->view('content_banner/admin', null, true);
			$data['content'] = $this->load->view('user_delete', $content, true);
			$this->load->view('backend_template_main', $data);

		} catch(Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage()); 
			redirect(base_url().'app/user');
		}
	}

	function delete_proc(){
		try{
			unset($arr); 
			$data = array(
				'ID_ADADOKSUSER' => $this->id_adadoksuser,
				'ID_STATUS' => '0',
			);			
			
			$delete = $this->User_model->delete_adadoksuser($data);

			$this->session->set_flashdata('success', 'User berhasil dinonaktifkan.');	
			redirect(base_url().'app/user');
		
			unset($arr); 
			$arr=["User berhasil dinonaktifkan.","&nbsp;","success"]; 			
			My::set_flash($arr);


		}catch(Exception $e){
			$this->session->set_flashdata('error', 'Error, ID Harus diisi');
			redirect(base_url().'app/user');
		}

		/*
		try{
			$data = array(
			'ID_ADADOKSUSER' => $this->id_adadoksuser,			
			);	

			if 
			$insert_data = $this->User_model->save_data($data, 'update');

			$this->session->set_flashdata('success', 'Data berhasil diupdate');
			redirect(base_url().'app/user');
			
		}catch(Exception $e){
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url().'app/user');
		}	
		*/
	}

}