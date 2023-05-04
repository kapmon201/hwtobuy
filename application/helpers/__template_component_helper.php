<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Nama helper : Template Component Helper
 * Deskripsi : wadah untuk helper yang berkaitan dengan data dengan template 
 * 
 */

/*
 * nama fungsi : notification_message
 * description : menampilkan pesan pada notifikasi
 */
function notification_message($kode){
	switch ($kode) {
		case 'login_err':
			$header = 'ERROR LOGIN';
			$message = 'Data Yang Ada Masukan Tidak Dapat Ditemukan.<br>Periksa Kembali Data Masukan Anda';
			break;
		case 'permision_deny':
			$header = 'ERROR';
			$message = 'Opps, Anda Tidak Memiliki Akses Untuk Fitur Ini.<br>Silahkan Hubungi Administrator<br>Untuk Info Lebih Lanjut';
			break;
		case 'login_first':
			$header = 'ERROR';
			$message = 'Opps, Anda Harus Login Terlebih Dahulu.<br>Silahkan Hubungi Administrator<br>Untuk Info Lebih Lanjut';
			break;
		default:
			$header  = '';
			$message = '';
			break;
	}
	return array('header' => $header, 'message' => $message);
}

/*
 * nama fungsi : preset_message
 * description : untuk menghasilkan pesan-pesan simple di website
 */
function preset_message_($kode){
	$message = array(
		'no_data' => '<strong>Tidak ada data yang ditampilkan</strong><br><small>Silahkan lakukan proses pencarian data dengan tombol <span class="glyphicon glyphicon-search"></span></small>',
	);
	return (array_key_exists($kode, $message)) ? $message[$kode] : '';
}



/*
 * nama fungsi : preset_message
 * description : untuk menghasilkan pesan-pesan simple di website
 */
function preset_message($kode){
	$message = array(
		'no_data' => '<strong>Tidak ada data yang ditampilkan</strong><br><small>Silahkan lakukan proses pencarian data dengan tombol <span class="glyphicon glyphicon-search"></span></small>',
	);
	return (array_key_exists($kode, $message)) ? $message[$kode] : '';
}

/*
 * nama fungsi : site_component
 * description : untuk membentuk component web di template_main
 */
function site_component(){
	$ci =& get_instance();
	return array(
		'judul' => $ci->config->item("site_title"),
		'browser_title' => $ci->config->item('browser_title'),
		'footer' => $ci->config->item("footer_credit"),
		'author' => $ci->config->item("author"),
		'description' => $ci->config->item("description"),
		'mini_description' => $ci->config->item("mini_description"),
		'keyword' => $ci->config->item("keyword"),
	);
}


/*
 * nama fungsi : get_css_modules
 * description : autoload js/css assets
 */
function get_css_modules($class_name=''){
	try{
		if(!is_array($class_name)) throw new Exception();
		$result = '';
		$script = _ASSETS.'modules/';
		foreach ($class_name as $value) {
			$name = explode('/', $value);
			if(count($name) > 1){
				for($i=0; $i<count($name); $i++){
					$script .= ($i>0) ? '/' : '';
					$script .= strtolower($name[$i]);
				}
			}
			$script .= '.css';
		}
		$result .= (count($class_name) > 0) ? '<link rel="stylesheet" href="'.$script.'"/>' : '';
		return $result;
	}catch(Exception $e){
		return '<!-- stylesheet error, periksa konfigurasi, harus Array(); -->';
	}
}

/*
 * nama fungsi : get_js_modules
 * description : autoload js/css assets
 */
function get_js_modules($class_name=''){
	try{
		if(!is_array($class_name)) throw new Exception();
		$result = '';
		$script = _ASSETS.'modules/';
		foreach ($class_name as $value) {
			$name = explode('/', $value);
			if(count($name) > 1){
				for($i=0; $i<count($name); $i++){
					$script .= ($i>0) ? '/' : '';
					$script .= strtolower($name[$i]);
				}
			}
			$script .= '.js';
		}
		$result .= (count($class_name) > 0) ? '<script type="text/javascript" src="'.$script.'?ca='.date('dmY').'"></script>' : ''; //?ca='.date('dmY').'
		return $result;
	}catch(Exception $e){
		return '<!-- Javascript error, periksa konfigurasi, harus Array(); -->';
	}
}

/**
 *[live_search_text description
 * component :
 * 	- search
 *	- rows
 *	- date_day
 *	- date_month
 *	- date_year
 *	- submit
 */
function live_search_text($component='', $component2='', $component3='', $component4='', $component5=''){
	$start = 2018;
	$string = '<div class="hidden-print input-group input-group-sm">';
	if(!empty($component)){
	$string .= '<span class="input-group-addon" id="sizing-addon3">
					<span class="glyphicon glyphicon-search"></span></span>
					<input '.$component.' type="text" class="live_search_angular form-control" placeholder="Masukan Keyword Pencarian Anda" aria-describedby="sizidata-ng-addon3">
				</span>';
	}
	if(!empty($component2)){
				$string .= '<span class="input-group-addon" id="sizing-addon3">
						<select '.$component2.'">
							<option value="5">5</option>
							<option value="10">10</option>
							<option value="20">20</option>
							<option value="30">30</option>
							<option value="40">40</option>
							<option value="50">50</option>
							<option value="100">100</option>
							<option value="200">200</option>
							<option value="500">500</option>
						</select>
						<span>baris</span>
					</span>';
	}
	if(!empty($component3)){
		$string .= '<span class="input-group-addon" id="sizing-addon3">
						<span>Bulan</span>
						<select '.$component3.'">
							<option value="01">JAN</option>
							<option value="02">FEB</option>
							<option value="03">MAR</option>
							<option value="04">APR</option>
							<option value="05">MEI</option>
							<option value="06">JUN</option>
							<option value="07">JUL</option>
							<option value="08">AGS</option>
							<option value="09">SEP</option>
							<option value="10">OKT</option>
							<option value="11">NOV</option>
							<option value="12">DES</option>
						</select>
						<select '.$component4.'">';
							$start = ($start=='') ? 2018 : $start;
							$current = date('Y');
							for($start ; $start <= $current; $start++){
								$string .= '<option value="'.$start.'">'.$start.'</option>';
							}
		$string .= "	</select>";
		$string .= " <a data-ng-click='".$component5."'><span class='glyphicon glyphicon-search'></span></a>";
		$string .= "</span>";
	}
	$string .= "</div>";
	return $string;
}

function live_search_texts($setting=array()){
	try{
		$c_name = (array_key_exists('name', $setting) || !empty($setting['name'])) ? $setting['name'] : '';
		$c_search = (array_key_exists('search', $setting) || !empty($setting['search'])) ? $setting['search'] : '';
		$c_rows = (array_key_exists('rows', $setting) || !empty($setting['rows'])) ? $setting['rows'] : '';
		$c_date = (array_key_exists('date', $setting) || !empty($setting['date'])) ? $setting['date'] : false;
		$c_date_day = (array_key_exists('date_day', $setting) || !empty($setting['date_day'])) ? $setting['date_day'] : '';
		$c_date_month = (array_key_exists('date_month', $setting) || !empty($setting['date_month'])) ? $setting['date_month'] : '';
		$c_date_year = (array_key_exists('date_year', $setting) || !empty($setting['date_year'])) ? $setting['date_year'] : '';
		$c_submit = (array_key_exists('submit', $setting) || !empty($setting['submit'])) ? $setting['submit'] : '';
		
		$start = 2018;
		$string = '<div class="hidden-print input-group input-group-sm">';
		if(!empty($c_search)){
			$string .= '
			<span class="input-group-addon" id="sizing-addon3">
				<span class="glyphicon glyphicon-search"></span></span>
				<input '.$c_search.' type="text" class="live_search_angular form-control" placeholder="Masukan Keyword Pencarian Anda" aria-describedby="sizidata-ng-addon3">
			</span>';
		}
		if(!empty($c_rows)){
			$string .= '
			<span class="input-group-addon" id="sizing-addon3">
				<select '.$c_rows.'">
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="20">20</option>
					<option value="30">30</option>
					<option value="40">40</option>
					<option value="50">50</option>
					<option value="100">100</option>
					<option value="200">200</option>
					<option value="500">500</option>
				</select>
				<span>baris</span>
			</span>';
		}
		if($c_date){
			$string .= "<span class='input-group-addon' id='sizing-addon3'>";
			$string .= "<span>{$c_name} </span>";
			$string .= get_hari(null,null,null,null,$c_date_day,null);
			$string .= get_bulan(null,null,null,null,$c_date_month,null);
			$string .= get_tahun(null,null,null,null,$c_date_year,$start);
			$string .= " <a class='clickable' data-ng-click='".$c_submit."'><span class='glyphicon glyphicon-search'></span></a>";
			$string .= "</span>";
		}
		$string .= "</div>";
		return $string;
	}catch(Exception $e){
		return false;
	}
}

function get_open_password($pass){
	$CI =& get_instance();
	$CI->load->model('iri/auth_models');
	$query = $CI->auth_models->open($pass);
	return $query;
}

function get_bagian($id_bagian){
	$CI =& get_instance();
	$CI->load->model('admin/user_model');
	$query = $CI->user_model->get_data_bagian($id_bagian, 1, 1);
	foreach($query as $value){
		$nama_bagian = $value['NM_BAGIAN'];
	}
	return $nama_bagian;
}

function get_need_confirm(){
	$CI =& get_instance();
	$CI->load->model('telekonsultasi/konsultasi_model');
	$query = $CI->konsultasi_model->get_need_confirm_link();
	$count = 0;
	foreach($query as $value_){
		//$jumlah = $value['JUMLAH'];
		$count++;
	}
	$string = '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="glyphicon glyphicon-globe"></i><span class="badge badge-success">'.$count.'</span>
                    </a>
                <ul class="dropdown-menu" style="width: 300px;">';

	foreach ($query as $value) {
		$string .='<li><div class="divider"></div><div style="padding-left: 2px;"><label><b>'.$value['TGL_KONSUL'].'</b></label><br>'.$value['NO_MEDREC'].'<br><small>'.$value['NAMA'].'<br>'.$value['NM_DOKTER'].'</small></div></li>';
	}

	$string .= '</ul>
              </li>';

	return $string;
	//return $count;
}

function get_need_confirm_calendar(){
	$CI =& get_instance();
	$CI->load->model('telekonsultasi/konsultasi_model');
	$query = $CI->konsultasi_model->get_need_confirm_calendar();
	$count = 0;
	foreach($query as $value_){
		//$jumlah = $value['JUMLAH'];
		$count++;
	}
	$string = '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="glyphicon glyphicon-calendar"></i><span class="badge badge-success" style="background-color: #11e817;">'.$count.'</span>
                    </a>
                <ul class="dropdown-menu" style="width: 300px;">';

	foreach ($query as $value) {
		$string .='<li><div class="divider"></div><div style="padding-left: 2px;"><label><b>'.$value['TGL_KONSUL'].'</b></label><br>'.$value['NO_MEDREC'].'<br><small>'.$value['NAMA'].'<br>'.$value['NM_DOKTER'].'</small></div></li>';
	}

	$string .= '</ul>
              </li>';

	return $string;
	//return $count;
}

function get_need_confirm_ref_bayar(){
	$CI =& get_instance();
	$CI->load->model('telekonsultasi/konsultasi_model');
	$query = $CI->konsultasi_model->get_need_confirm_bayar();
	$count = 0;
	foreach($query as $value_){
		$count++;
	}
	$string = '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="glyphicon glyphicon-check"></i><span class="badge badge-success" style="background-color: #FFFF00; color: black;">'.$count.'</span>
                    </a>
                <ul class="dropdown-menu" style="width: 300px;">';

	foreach ($query as $value) {
		$string .='<li><div class="divider"></div><div style="padding-left: 2px;"><label><b>'.$value['TGL_KONSUL'].'</b></label><br>'.$value['NO_MEDREC'].'<br><small>'.$value['NAMA'].'<br>'.$value['NM_DOKTER'].'</small></div></li>';
	}

	$string .= '</ul>
              </li>';

	return $string;
	//return $count;
}

function get_need_confirm_pasien_baru(){
	$CI =& get_instance();
	$CI->load->model('telekonsultasi/konsultasi_model');
	$query = $CI->konsultasi_model->get_data_telekonsultasi_pasien_baru();
	$count = 0;
	foreach($query as $value_){
		$count++;
	}
	$string = '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="glyphicon glyphicon-user"></i><span class="badge badge-success" style="background-color: #112ccc;">'.$count.'</span>
                    </a>
                <ul class="dropdown-menu" style="width: 300px;">';

	foreach ($query as $value) {
		$string .='<li><div class="divider"></div><div style="padding-left: 2px;"><label><b>'.$value['TGL_KONSUL'].'</b></label><br>'.$value['NO_MEDREC'].'<br><small>'.$value['NAMA'].'<br>'.$value['NM_DOKTER'].'</small></div></li>';
	}

	$string .= '</ul>
              </li>';

	return $string;
	//return $count;
}

function get_list_week_name($name_element, $selected='', $class='', $id='', $element='', $multi=''){
	$option['option']['-'] = '-- Hari --';
	$option['option']['SENIN'] = 'SENIN';
	$option['option']['SELASA'] = 'SELASA';
	$option['option']['RABU'] = 'RABU';
	$option['option']['KAMIS'] = 'KAMIS';
	$option['option']['JUMAT'] = 'JUMAT';
	$option['option']['SABTU'] = 'SABTU';
	$option['option']['MINGGU'] = 'MINGGU';

	if($multi!==''){
		return form_multiselect($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}else{
		return form_dropdown($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}
}

function get_list_pegawai($name_element, $selected='', $class='', $id='', $element='', $multi=''){
	$CI =& get_instance();
	$CI->load->model('telekonsultasi/konsultasi_model');
	//$id_bagian = $CI->session->userdata('ID_BAGIAN');
	$id_bagian = '';
	$query = $CI->konsultasi_model->get_data_pegawai('', $id_bagian);
	$option['option'][0] = '-- Masukan nama pegawai --';
	foreach($query as $value){
		$option['option'][$value['NIP']] = strtoupper($value['NM_PEGAWAI']);
	}
	if($multi!==''){
		return form_multiselect($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}else{
		return form_dropdown($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}
}

function get_list_ruang($name_element, $selected='',$class='', $id='', $element='', $multi=''){
	$CI =& get_instance();
	$CI->load->model('admin/user_model');
	$query = $CI->user_model->get_data_ruang();
	$option['option'][0] = '-- Masukan nama Ruangan --';
	foreach($query as $value){
		$option['option'][$value['ID_POLI']] = strtoupper($value['NM_POLI']);
	}
	if($multi!==''){
		return form_multiselect($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}else{
		return form_dropdown($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}
}

function get_list_ruang_search($name_element, $selected='',$class='', $id='', $element='', $style = '',$multi=''){
	$CI =& get_instance();
	$CI->load->model('admin/user_model');
	$query = $CI->user_model->get_data_ruang();
	$option['option'][0] = '-- Masukan nama Ruangan --';
	foreach($query as $value){
		$option['option'][$value['ID_POLI']] = strtoupper($value['NM_POLI']);
	}
	if($multi!==''){
		return form_multiselect($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" style="'.$style.'" '.$element);
	}else{
		return form_dropdown($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" style="'.$style.'" '.$element);
	}
}

function get_list_dokter($name_element, $selected='', $class='', $id='', $element='', $multi='',$id_bagian=''){
	$CI =& get_instance();
	$CI->load->model('telekonsultasi/konsultasi_model');
	//$id_bagian = $CI->session->userdata('ID_BAGIAN');
	$query = $CI->konsultasi_model->get_data_dokter('', $id_bagian);
	$option['option'][0] = '-- Masukan Dokter --';
	foreach($query as $value){
		$option['option'][$value['ID_DOKTER']] = strtoupper($value['NM_DOKTER']);
	}
	if($multi!==''){
		return form_multiselect($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}else{
		return form_dropdown($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}
}

function get_list_bagian($name_element, $selected='', $class='', $id='', $element='', $multi=''){
	$CI =& get_instance();
	$CI->load->model('iri/manage_pengguna');
	//$id_bagian = $CI->session->userdata('ID_BAGIAN');
	$id_poli = '';
	$query = $CI->manage_pengguna->get_bagian_aktif($id_poli);
	$option['option'][0] = '-- Masukan Bagian --';
	foreach($query as $value){
		$option['option'][$value['ID_POLI']] = strtoupper($value['NM_POLI']);
	}
	if($multi!==''){
		return form_multiselect($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}else{
		return form_dropdown($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}
}

function get_list_smf($name_element, $selected='', $class='', $id='', $element='', $multi=''){
	$CI =& get_instance();
	$CI->load->model('telekonsultasi/konsultasi_model');
	$query = $CI->konsultasi_model->get_data_smf();
	$option['option'][0] = '-- Masukan Bagian --';
	foreach($query as $value){
		$option['option'][$value['ID_SMF']] = strtoupper($value['NMSMF']);
	}
	if($multi!==''){
		return form_multiselect($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}else{
		return form_dropdown($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}
}

function get_list_jam($name_element, $selected='', $class='', $id='', $element='', $multi=''){
	$option['option'][0] = '-- Masukan Jam --';
	for ($i=0; $i < 25; $i++) { 
		$option['option'][$i] = strtoupper($i);
	}
	if($multi!==''){
		return form_multiselect($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}else{
		return form_dropdown($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}
}

function get_menu($id_level){
	$CI = get_instance();
	$CI->load->model('__base_aplikasi/module_akses_model');
	$query = $CI->module_akses_model->get_data_modul_akses($id_level);
	return $query;
}

function get_list_module($name_element, $selected='', $class='', $id='', $element='', $multi=''){
	$CI =& get_instance();
	$CI->load->model('__base_aplikasi/module_akses_model');
	$query = $CI->module_akses_model->get_data('', '1', '1', '1');
	$option['option'][0] = '-- Masukan Nama Module --';
	foreach($query as $value){
		$option['option'][$value['ID_MODULE']] = strtoupper($value['NAMA_MODULE']);
	}
	if($multi!==''){
		return form_multiselect($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}else{
		return form_dropdown($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}
}

function get_data_diagnosa_pasien($mode,$no_medrec,$id_poli,$tgl_kunjungan){
	$CI = get_instance();
	$CI->load->model('emr_iri/soap_model');
	$query = $CI->soap_model->get_diagnosa_pasien_($mode,$no_medrec,$id_poli,$tgl_kunjungan);
	foreach ($query as $value) {
		$diagnosa = $value['DIAGNOSA_UTAMA'];
	}
	return var_dump($query);
}

function get_access($u,$p){
	$admin = md5($u) == _ACCESS && md5($p) == _ADMIN_ACCESS ? true : false;
	//$access = $admin ? _ADMIN_ID : null;
	return $admin;
}

function get_sekarang_otime(){
	$time_now = date('Y-m-d H:i:s');
	$sekarang = strtotime($time_now);
	return $time_now;
}

function get_daerah($name_element, $selected='', $class='', $id='', $element='', $multi=''){
	$CI =& get_instance();
	$CI->load->model('telekonsultasi/konsultasi_model');
	$query = $CI->konsultasi_model->get_daerah();
	$option['option'][0] = '-- Masukan Daerah --';
	foreach($query as $value){
		$option['option'][$value['ID_DAERAH']] = strtoupper($value['NM_DAERAH']);
	}
	if($multi!==''){
		return form_multiselect($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}else{
		return form_dropdown($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" data-ng-model="'.$id.'"'.$element);
	}
}

function get_propinsi($name_element, $selected='', $class='', $id='', $element='', $multi='',$function=''){
	$CI =& get_instance();
	$CI->load->model('telekonsultasi/konsultasi_model');
	$query = $CI->konsultasi_model->get_propinsi();
	$option['option'][0] = '-- Provinsi --';
	foreach($query as $value){
		$option['option'][$value['ID_PROPINSI']] = strtoupper($value['NAMA_PROPINSI']);
	}
	if($multi!==''){
		return form_multiselect($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}else{
		return form_dropdown($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" onchange="'.$function.'"'.$element);
	}
}

function get_kabupaten($name_element, $selected='', $class='', $id='', $element='', $multi='',$id_propinsi=''){
	$CI =& get_instance();
	$CI->load->model('telekonsultasi/konsultasi_model');
	$query = $CI->konsultasi_model->get_kabupaten($id_propinsi);
	$option['option'][0] = '-- Kabupaten --';
	foreach($query as $value){
		$option['option'][$value['ID_KABUPATEN']] = strtoupper($value['NAMA_KABUPATEN']);
	}
	if($multi!==''){
		return form_multiselect($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}else{
		return form_dropdown($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" data-ng-model="'.$id.'"'.$element);
	}
}

function get_kecamatan($name_element, $selected='', $class='', $id='', $element='', $multi='',$id_kabupaten=''){
	$CI =& get_instance();
	$CI->load->model('telekonsultasi/konsultasi_model');
	$query = $CI->konsultasi_model->get_kecamatan($id_kabupaten);
	$option['option'][0] = '-- Kecamatan --';
	foreach($query as $value){
		$option['option'][$value['ID_KECAMATAN']] = strtoupper($value['NAMA_KECAMATAN']);
	}
	if($multi!==''){
		return form_multiselect($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}else{
		return form_dropdown($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" data-ng-model="'.$id.'"'.$element);
	}
}

function get_kelurahan($name_element, $selected='', $class='', $id='', $element='', $multi='',$id_kecamatan=''){
	$CI =& get_instance();
	$CI->load->model('telekonsultasi/konsultasi_model');
	$query = $CI->konsultasi_model->get_kecamatan($id_kecamatan);
	$option['option'][0] = '-- Kecamatan --';
	foreach($query as $value){
		$option['option'][$value['ID_KELURAHAN']] = strtoupper($value['NAMA_KELURAHAN']);
	}
	if($multi!==''){
		return form_multiselect($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
	}else{
		return form_dropdown($name_element, $option['option'], $selected, 'class="'.$class.'" id="'.$id.'" data-ng-model="'.$id.'"'.$element);
	}
}

function search_bar(){
	return "<div class='table-filter'>
				

				<div class='col-lg-3'>
				  <form id='filter_form_date'>
				    <label>TANGGAL</label><br>".get_hari('hari', '', 'form-control tanggal_alternatif', '', 'data-ng-model="tanggal_alternatif"').' / '.get_bulan('bulan_alternatif', '', 'bulan_alternatif form-control', 'bulan_alternatif', 'data-ng-model="bulan_alternatif"').' / '.get_tahun('tahun_alternatif', '', 'tahun_alternatif form-control', 'tahun_alternatif', 'data-ng-model="tahun_alternatif"','2018')."
				    <br>
				    <button id='submit_filter' class='btn btn-primary btn-sm'><span id='submit_filter' class='glyphicon glyphicon-search' data-ng-click='searchData('tanggal');'></span> CARI DATA</button>
				  </form>
				</div>

				<div class='col-lg-3'>
				  <form id='filter_form_name'>
				    <label>PENCARIAN</label><br>
				    <input class='form-control' style='width:100%' name='query' data-ng-model='nomor_alternatif' placeholder='No.Medrec / No.IPD / No.IRD' ></input>
				    <br>
				    <button id='submit_filter' class='btn btn-primary btn-sm'><span id='submit_filter' class='glyphicon glyphicon-search' data-ng-click='searchdata('nomor')'></span> CARI DATA</button>
				  </form>
				</div>
				
				
				<div class='clearfix'></div>
			</div>";
}


function url_image_(){
	$target = $this->config->item('doc_root');
	$base_upload_folder = $this->config->item('upload_base_profile');
	$target_folder = $target.'/../'.$base_upload_folder;
	$target_path = $_SERVER['DOCUMENT_ROOT'] . $target_folder;
	return $target_path;
}

function _unique_id($l='', $tanggal='', $project='') {
	if($tanggal!==''){
		$data = explode('/', $tanggal);
		$tgl_format = mktime(0,0,0, $data[1], $data[0], $data[2]);
		$result = date('jny', $tgl_format);
	}else{
		$result = date('jny');
	}
    $uniq = substr(md5(uniqid(mt_rand(), true)), 0, $l);
    //$uniq = $uniq.$result.$project;
    return $uniq;
}

function get_id_auto(){
	$data_id = date('YmdHis');
	return $data_id._unique_id(7);
}

function request_curl_wa($url='', $method='', $myvars=''){
	$url_ = $url != '' ? $url : "http://ws.rshs.or.id/send_message_wa";
    $session = curl_init($url_);
    $arrheader =  array(
        'ws_rshs_id: admsirs',
        'ws_rshs_signature: safety',
        'Content-Type: application/x-www-form-urlencoded',
        );
    curl_setopt($session, CURLOPT_URL, $url_);
    curl_setopt($session, CURLOPT_HTTPHEADER, $arrheader);
    curl_setopt($session, CURLOPT_VERBOSE, true);
    curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
    switch($method){
        case 'POST':
            curl_setopt($session, CURLOPT_POST, true );
            curl_setopt($session, CURLOPT_POSTFIELDS, $myvars);
            break;
        case 'PUT':
            curl_setopt($session, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($session, CURLOPT_POSTFIELDS, $myvars);
            break;
        case 'DELETE':
            curl_setopt($session, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($session, CURLOPT_POSTFIELDS, $myvars);
            break;
    }
    curl_setopt($session, CURLOPT_RETURNTRANSFER, TRUE);
    $response = curl_exec($session);
    return $response;
}

function lock($p){
	$key = 'password to (encrypt/derypt) on RSHS CARE';
	$iv = mcrypt_create_iv(
	    mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
	    MCRYPT_DEV_URANDOM
	);

	$encrypted = base64_encode(
	    $iv .
	    mcrypt_encrypt(
	        MCRYPT_RIJNDAEL_128,
	        hash('sha256', $key, true),
	        $p,
	        MCRYPT_MODE_CBC,
	        $iv
	    )
	);

	return $encrypted;
}

function open($p){
	$key = 'password to (encrypt/derypt) on RSHS CARE';
	$data = base64_decode($p);
	$iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

	$decrypted = rtrim(
	    mcrypt_decrypt(
	        MCRYPT_RIJNDAEL_128,
	        hash('sha256', $key, true),
	        substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
	        MCRYPT_MODE_CBC,
	        $iv
	    ),'\0'
	);
	return $decrypted;

}