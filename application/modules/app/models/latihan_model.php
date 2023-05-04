<?php
defined('BASEPATH')	OR exit('No direct script access allowed');

class Latihan_model extends CI_model {
	public $strings=["",""]; 
	public $ints=[0,0]; 
	public $arr; 
	public $arr_multi=[[]];
	private $tables = ["lat_user",];

	var $mbahcoding_table = "LAT_CUSTOMERS";
	var $mbahcoding_columnorder = array(null, "FIRST_NAME","LAST_NAME","PHONE","ADDRESS","CITY","COUNTRY"); //set column field database for datatable orderable
	var $mbahcoding_columnsearch = array("FIRST_NAME","LAST_NAME","PHONE","ADDRESS","CITY","COUNTRY"); //set column field database for datatable searchable 
	var $mbahcoding_order = array("ID_CUSTOMER" => "ASC"); // default order 
	
	/*
	mbahcoding_get 

	ambil_ref 
	ambil  
	simpan 
	hapus 

	*/

	function __construct(){
		parent::__construct();
		// $this->load->database();
	}
	
	public function get($is_result_array=null) {
		if ($is_result_array) : 
			return $this->db->get("ajax_mahasiswa")->result_array(); 
		else : 
			return $this->db->get("ajax_mahasiswa")->result();
		endif; 
	}
	
	public function get_row($sql_query=null){
		return $this->db->query($sql_query)->row(); 
	}
	
	function ambil_ref($data=[]){
		try{
			$sql = "SELECT * 
					FROM adadoks_privilege
					WHERE ID IS NOT NULL";
			$sql .= " ORDER BY 2";

			return $this->db->query($sql)->result_array();
		}catch(Exception $e){
			return false;
		}
	}
	
	function ambil($data=array()){
		try{
			$sql = "
			SELECT a.*, to_char(tgl_update, 'YYYY-MM-DD Hh24:MI:SS') as TGL_UPDATEFORMATTED, 
			B.NM_PEGAWAI 
			FROM ADADOKS_USER A
			LEFT JOIN PEGAWAI B ON A.ID_ADADOKSUSER = B.NIP
			WHERE A.ID_ADADOKSUSER IS NOT NULL";
			
			$sql .= (array_key_exists('id_adadoksuser', $data) && !empty($data['id_adadoksuser'])) ? " AND a.id_adadoksuser = '".$data['id_adadoksuser']."'" : "";
			$sql .= (array_key_exists('nip2', $data) && !empty($data['nip2'])) ? " AND a.nip2 = '".$data['nip2']."'" : "";
			$sql .= (array_key_exists('nm_pegawai', $data) && !empty($data['nm_pegawai'])) ? " AND lower(b.nm_pegawai) like '%".$data['nm_pegawai']."%'" : "";
			
			$sql .= (array_key_exists('order_by', $data) && !empty($data['order_by'])) ? " order by ".$data['order_by'] : "";
			return $this->db->query($sql)->result_array();
		}catch(Exception $e){
			return false;
		}
	}
	
	function simpan($data=array(), $mode_input){
	// save_data($data=array(), $mode_input){
		try{
			if(!is_array($data) || count($data)==0) throw new Exception();

			switch ($mode_input) {
				case 'update':
					if(array_key_exists('tgl_pilihan', $data) && !empty($data['tgl_pilihan'])){
						$this->db->set("tgl_pilihan", "TO_DATE('".$data['tgl_pilihan']."', 'YYYYMMDD')", FALSE);
						unset($data['tgl_pilihan']);
					}
					$this->db->where('id_adadoksuser', $data['id_adadoksuser']);
					return $this->db->update('adadoks_user', $data);
					break;
				default:
					if(array_key_exists('tgl_pilihan', $data) && !empty($data['tgl_pilihan'])){
						$this->db->set("tgl_pilihan", "TO_DATE('".$data['tgl_pilihan']."', 'YYYYMMDD')", FALSE);
						unset($data['tgl_pilihan']);
					}
					return $this->db->insert('adadoks_user', $data);
					break;
			}
		}catch(Exception $e){
			return false;
		}
	}

	function hapus($data){
	// delete_data($data)
		try{
			if(empty($data)) throw new Exception();
			$this->db->where('NIP', $data['NIP']);
			return $this->db->delete('TES_ANGULAR_PEGAWAI');
		}catch(Exception $e){
			return false;
		}	
	}
	

	public function mbahcoding_getdatatablesquery()
	{			 
		$this->db->from("LAT_CUSTOMERS");
		
		
		$i = 0;		 
		foreach ($this->mbahcoding_columnsearch as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{			
				if($i===0) // first loop
				{
					// $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
					
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}
	
				if(count($this->mbahcoding_columnsearch) - 1 == $i); //last loop
					// $this->db->group_end(); //close bracket


				/*
				if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i); //last loop
                    // $this->db->group_end(); //close bracket


            }	
				*/	
			}
			$i++;
		}
			 
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->mbahcoding_columnorder[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->mbahcoding_order))
		{
			$order = $this->mbahcoding_order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
		
	}
	 
	public function mbahcoding_getdatatables()
	{
		
		$this->mbahcoding_getdatatablesquery();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			
		$query = $this->db->get();
		return $query->result();
	}
	 
	public function mbahcoding_countfiltered()
	{
		$this->mbahcoding_getdatatablesquery();
		$query = $this->db->get();
		return $query->num_rows();
	}
	 
	public function mbahcoding_countall()
	{
		$this->db->from($this->mbahcoding_table);
		return $this->db->count_all_results();
	}
	 
	

	/*
	function get($data=array()) {		 
		$strings[0] = "select ".((array_key_exists('columns', $data) && !empty($data['columns'])) ? $data["columns"] : "*")." from ".$this->tables[0]." where id_latuser is not null "; 

		$strings[0] .= (array_key_exists('id_latuser', $data) && !empty($data['id_latuser'])) ? " and lower(id_latuser) = '".$data["id_latuser"]."'" : "";
		$strings[0] .= (array_key_exists('username', $data) && !empty($data['username'])) ? " and username '".$data["username"]."'" : "";
		
		$strings[0] .= (array_key_exists('order_by', $data) && !empty($data['order_by'])) ? " order by ".$data["order_by"] : " order by id_latuser asc ";

		// return $strings[0]; 
		return $this->db->query($strings[0])->result_array();
	}


	function save($data=array(), $mode_data='insert'){
		try{
			switch($mode_data){
				case 'update':
					$this->db->where('ID_ADADOKSUSER', $data['ID_ADADOKSUSER']);
					return $this->db->update('ADADOKS_USER', $data);
					break;
				default:
					return $this->db->insert('ADADOKS_USER', $data);
					break;
			}
			
		} catch(Exception $e){
			return false;
		}
	}

	function delete_adadoksuser($data=array()){
		$this->db->where('ID_ADADOKSUSER', $data['id_adadoksuser']);
		return $this->db->update('ADADOKS_USER', $data);
		
	}

	function delete($data=array()){
		$this->db->where('ID_ADADOKSUSER', $data['ID_ADADOKSUSER']);
		return $this->db->delete('ADADOKS_USER');
	}
	*/
	
}