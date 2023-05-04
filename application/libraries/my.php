<?php 
class My {
	/*
	get_btnsubmit 
	get_btnreset  
	get_link 
	*/

	const PHI = 3.14;
	private $str="";
	private $arr;	 
	public $ints=[0,0]; 
	public $strings=["",""]; 
	public $booleans=[true, false]; 
	public $floats=[3.2]; 
	
	public $arrs=[
		[
			"npm"=>1083177,
			"nama"=>"hilmi",
			"jk"=>"L",
			"email"=>"hilmi@live.com",
			"tugas"=>[70,72,78],
			"pp"=>"1083177.jpg" 
		],
		[
			"npm"=>1083170,
			"nama"=>"adelia",
			"jk"=>"P",
			"email"=>"adelia@live.com",
			"tugas"=>[73,71,74],
			"pp"=>"1083170.jpg"
		],
		[
			"npm"=>1083171,
			"nama"=>"belinda",
			"jk"=>"P",
			"email"=>"belinda@live.com",
			"tugas"=>[76,74,79],
			"pp"=>"1083171.jpg"
		]
	];

	/*
	clean code php:  

	-gunakan nama variable yg jelas dan mudah dipahami 
	-variable lebih baik lowercase aja dng underscore, dan function camelCase
	-nama variable tidak lebih dari 3 kata. penyingkatan variable boleh jika di dalam scope dan scope itu tidak besar dan hanya utk indexing angka contoh: for ($index = 0 ; $index <  
	-gunakan ending s untuk kata yg punya nilai banyak (array) 
	-reusable variable : kalo udah bikin variable, usahakan buat itu terus jangan buat2 lagi  baru 
	-masukan variable ke dalam object dan memang memiliki parent yg sama 

	--start clean code php: penggunaan variable 
	- return secepatnya dan jgn nesting terlalu dalam, terlalu banyak if-else. lebih baik dipecah ke bbrp function 

	- gunakan type hinting sebisa mungkin 

	- gunakan parameter default (utk fungsi)

	- gunakan phpdoc utk parameter description 

	--end clean code php: penggunaan variable 

	--START 3 clean code php: control structure

	- gunakan identical operator: sama nilai & sama tipe data (===) daripada ==

	- logic harus simple dan seefisien mungkin 

	- gunakan ? dibanding if jika value sederhana. misal: cek data string

	- gunakan switch utk nilai diketahui dan if utk expression 

	- hindari nested terlalu dalam 

	- lanjutkan looping secepatnya jika nilai tidak sesuai 

	- keluar dari looping secepatnya, jika nilai sudah didapat 

	--END 3 clean code php : control structure 

	$_GET["id_user"]="USR001";
	$_GET["username"]="kapmon201"; 

	--START PART 4 - FUNCTION 

	1. selalu gunakan phpdoc sebagai function description 
	2. nama fungsi maksimal 3 kata. dng camelCase. tujuan jelas, to the point. pisahkan fungsi jika beda tujuan. cek kesalahan terlebih dulu, lalu return secepatnya
	pindahkan semua statement dalam anonymous function ke dalam function baru agar reusable 
	3. fungsi digunakan agar tidak mengulang2 statement. jadi 1 fungsi bisa jalankan banyak statement jika tanpa fungsi 
	4. jangan ubah nilai global variable dalam fungsi 
	5. parameter fungsi harus dibawah 2. gunakan objek/interface jika memungkinkan 
	6. jangan buat fungsi global, jika terpaksa gunakan cek function_exists 
	7. semaksimal mungkin hindari bool flag 
	8. hapus fungsi tidak terpakai. contoh: fungsi lama, fungsi baru, fungsi terbaru 

	--END PART 4 - FUNCTION 
	*/

	/**
	* function description 
	* @param object param_obj {processor,ram,gpu,model,price}
	* @return void 
	*/

	/* 
		vid 12 - oop - constant  
		define('PHI', 3.14); 
	
	*/
	
	// 	alert('berhasil menambah data\n\t\u00A9THCenter\u00AEhwtobuy\u2122');
			// else :
			// echo "<script>
			// 	alert('gagal menambah data\nperiksa kembali'); 
			// 	document.location.href='index.php';
			// 	</script>";


	/*
	($this->session->flashdata('error')) ? 
	"<div class=\"alert alert-danger\">".$this->session->flashdata('error')."<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    		<span aria-hidden=\"true\">&times;</span>
  			</button></div>" : "&nbsp;"; 
			?>

			<?=
			($this->session->flashdata('success')) ? 
			"<div class=\"alert alert-info\">".$this->session->flashdata('success')."<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button></div>" : "&nbsp;";  
			?>	  

	*/

	
	public function get_btnsubmit($arr=null) {
		if (!$arr==null) : 
			return "<button type=\"submit\" id=\"".$arr[0]."\" name=\"".$arr[1]."\" class=\"btn btn-primary btn-sm\" tabindex=\"".$arr[2]."\">OK</button>"; 
		endif; 

		return "<button type=\"submit\" id=\"btn_submit\" name=\"btn_submit\" class=\"btn btn-primary btn-sm\">OK</button>";
	}

	public function get_btnreset($arr=null) {
		if (!$arr==null) : 
			return "<button type=\"reset\" id=\"".$arr[0]."\" name=\"".$arr[1]."\" class=\"btn btn-primary btn-sm\" tabindex=\"".$arr[2]."\">Reset</button>"; 
		endif; 

		return "<button type=\"reset\" id=\"btn_reset\" name=\"btn_reset\" class=\"btn btn-primary btn-sm\">Reset</button>";
   }
	
	public function get_link($arr) {
		unset($strings); 
		if (array_key_exists("delete_message", $arr) && !empty($arr["delete_message"])) :
			$strings[0] = $arr["delete_message"]; 
		else : 
			$strings[0] = "Perhatian! Anda akan menghapus data ini.\nPastikan data ini yang akan dihapus."; 
		endif; 

		// btn btn-sm btn-outline-secondary
		if (array_key_exists('is_back', $arr) && !empty($arr['is_back'])) :
			return anchor($arr["to"], "Kembali", array('class' =>"btn btn-primary btn-sm mt-0 mb-0","title"=>"Kembali ke halaman sebelum"));
		else : 
			if (array_key_exists("is_delete", $arr) && !empty($arr["is_delete"])) :
				return anchor($arr["to"], $arr["label"], array("id"=>$arr["id"], "class"=> "btn btn-primary btn-sm mt-0 mb-0","onclick"=>"return confirm('".$strings[0]."')", "title"=>$arr["title"]));

			else :
				return anchor($arr["to"], $arr["label"], array("id"=>$arr["id"], "class"=> "btn btn-primary btn-sm mt-0 mb-0", "title"=>$arr["title"]));
			endif; 
		endif;
	}


	public function get_btn($arr) {
	   // utk btn memunculkan modals 
    	if (count($arr)>3) : 
    		return "<button type=\"button\" class=\"btn btn-primary btn-sm\" id=\"".$arr[0]."\" data-toggle=\"".$arr[3]."\" data-target=\"#".$arr[4]."\" title=".$arr[2].">".$arr[1]."</button>"; 
    	endif; 

    	return "<button type=\"button\" class=\"btn btn-primary btn-sm\" id=\"".$arr[0]."\" title=".$arr[2].">".$arr[1]."</button>";
    }



	function session_check($session) {       
       if(!isset($session)) : 
          redirect('app/');
       endif;  	   
   }

	 function get_randomstr($arr, $length){
       
        /* $str = 'abcdefghijklmnopqrstuvwzyz';
        $str1= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $str2= '0123456789'; */

        $shuffled = str_shuffle($arr[0]); // yyyymmdd 8 
        $shuffled1 = str_shuffle($arr[1]); // nik : 3174025104490001 16 
        // $shuffled2 = str_shuffle($arr[0]); // OPT: no_antrian
        $total = $shuffled.$shuffled1;
        $shuffled2 = str_shuffle($total);
        $result= substr($shuffled2, 0, $length); // 9 

        return $result;

				// echo get_randomstr(8);

    }


	// START FORM
		function get_txtfield($arr) {
    	/*
		autofocus placeholder="input medrec" autocomplete="off" >
		*/

		if (!$param_arr[5]==null) : 
			$this->arr = array(
	        	'class'         => "form-control input-sm",
	        	'id'            => $param_arr[0],
	        	'maxlength'		=> ($param_arr[1]) ? $param_arr[1] : "5",                          
	        	'name'          => ($param_arr[2]) ? $param_arr[2] : $param_arr[0],
	        	'readonly'		=> "readonly", 
	        	'size'          => ($param_arr[3]) ? $param_arr[3] : 0 ,
	        	'value'			=> ($param_arr[4]) ? $param_arr[4] : null 
	    	);
	    else : 
	    	$this->arr = array(
	        	'class'         => "form-control input-sm",
	        	'id'            => $param_arr[0],
	        	'maxlength'		=> ($param_arr[1]) ? $param_arr[1] : "32",                          
	        	'name'          => ($param_arr[2]) ? $param_arr[2] : $param_arr[0], 
	        	'size'          => ($param_arr[3]) ? $param_arr[3] : 0 ,
	        	'value'			=> ($param_arr[4]) ? $param_arr[4] : null 
	    	);	
		endif; 

		

        return form_input($this->arr);
    }

    function get_textfield($param_arr) {
    	/*
		autofocus placeholder="input medrec" autocomplete="off" >
		*/

		if (!$param_arr[5]==null) : 
			$this->arr = array(
	        	'class'         => "form-control input-sm",
	        	'id'            => $param_arr[0],
	        	'maxlength'		=> ($param_arr[1]) ? $param_arr[1] : "5",                          
	        	'name'          => ($param_arr[2]) ? $param_arr[2] : $param_arr[0],
	        	'readonly'		=> "readonly", 
	        	'size'          => ($param_arr[3]) ? $param_arr[3] : 0 ,
	        	'value'			=> ($param_arr[4]) ? $param_arr[4] : null 
	    	);
	    else : 
	    	$this->arr = array(
	        	'class'         => "form-control input-sm",
	        	'id'            => $param_arr[0],
	        	'maxlength'		=> ($param_arr[1]) ? $param_arr[1] : "32",                          
	        	'name'          => ($param_arr[2]) ? $param_arr[2] : $param_arr[0], 
	        	'size'          => ($param_arr[3]) ? $param_arr[3] : 0 ,
	        	'value'			=> ($param_arr[4]) ? $param_arr[4] : null 
	    	);	
		endif; 

		

        return form_input($this->arr);
    }  
	
	function get_labelfor($param_str, $is_required=null ) {
		if ($is_required!=null) : 
			return "<label for=\"".$param_str."\">".ucfirst($param_str)."<b>*</b></label>";  
		endif; 

		return "<label for=\"".$param_str."\">".ucfirst($param_str)."</label>";
		
		 
	}	

	function get_formvalelement($param_str) {
		return "<small class=\"form-text text-danger\">".form_error($param_str)."</small>";
	}

	function get_formelement($param_str, $param_arr) {
		return "<tr><td>".$this->get_labelfor($param_str)."</td><td>".$this->get_textfield($param_arr)."".$this->get_formvalelement($param_str)."</td></tr>"; 
	}

	function get_textarea($param_arr) {
		if (!$param_arr[5]==null) : 
			$this->arr = array(
	        'class'         => "form-control input-sm",
	        'cols'          => ($param_arr[0]) ? $param_arr[0] : 32, 
	        'id'            => $param_arr[1],                        
	        'name'          => ($param_arr[2]) ? $param_arr[2] : $param_arr[1],
	        'readonly'		=> "readonly",
	        'rows'          => ($param_arr[3]) ? $param_arr[3] : 3,	        
	        'value'			=> ($param_arr[4]) ? $param_arr[4] : null
	    );
		else : 
			$this->arr = array(
	        'class'         => "form-control input-sm",
	        'cols'          => ($param_arr[0]) ? $param_arr[0] : 32, 
	        'id'            => $param_arr[1],                        
	        'name'          => ($param_arr[2]) ? $param_arr[2] : $param_arr[1],
	        'rows'          => ($param_arr[3]) ? $param_arr[3] : 3,	        
	        'value'			=> ($param_arr[4]) ? $param_arr[4] : null
	    );
		endif; 

		

		return form_textarea($this->arr);

	}

	// combobox 
	function get_combobox($id_name, $arr) {

		$str = "<select class=\"form-control input-sm\" id=\"$id_name\" name=\"$id_name\">";
		foreach($arr as $arr) : 
			
     			$str .= "<option value=$arr>".ucfirst($arr)."</option>";
     		 	
   		endforeach;
   		$str.="</select>"; 

   		return $str; 
    }  

   

	

    public function get_btn_submit() {
    	return "<button type=\"submit\" id=\"btn_submit\" name=\"btn_submit\" class=\"btn btn-primary btn-sm\">OK</button>"; 

    }

    

    public function get_btn_reset() {
    	return "<button type=\"reset\" id=\"btn_reset\" name=\"btn_reset\" class=\"btn btn-primary btn-sm\">Reset</button>"; 

    }

    

    /*
	public function get_link_back($param) {
		return anchor($param, 'Kembali', array("id"=>"link_back",'class' =>"btn btn-sm btn-outline-secondary mt-2 mb-2","title"=>"Kembali ke halaman sebelum"));

	}
	*/
	// END FORM 

	//$current_date=date(format,"Y-m-d");

	/*
	public function setMethod(string $param_str='') : void {

	}

	public function setMethod(object $param_obj) : void {


	}

	public function setMethod(string $param_str=null) : void {
		$param_str = isset($param_str)? $param_str : ''; 
		$param_str = is_string($param_str) ? $param_str : ''; 
		$param_str = $param_str ?? ''; //php7's null coallescing 
		$param_str ??= ''; //php7.4's null coallescing 

	}

	getProperties 
	public function getMethod(string $param_str='') : string {
		if (!empty($param_str)) : 
			return $this->nama;
		endif; 

	} 
	*/
	
	
	
	
	
	/* 
		START functions from latihan 

		if ($_POST["txt_username"]=="admin" && $_POST["txt_password"]=="123") {
			header("Location: admin/index.php");
		} else { 
			$booleans[0]=false; 
		}



	*/

}
