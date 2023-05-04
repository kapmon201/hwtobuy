<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Nama helper : Data Helper
 * Deskripsi : wadah untuk helper yang berkaitan dengan data dengan tanggal
 * 
 */

function get_tanggalformatindonesia($tanggal) {
	if (is_kosong($tanggal)==$tanggal) :
   	$strings = explode(" ", date_format(date_create($tanggal),"d m Y"));
      return $strings[0]." ".get_bulan($strings[1])." ".$strings[2]; 
	else : 
   	return null;
   endif;  
} 

function get_bulanangka($bulan){
	switch ($bulan) {
		case strtolower("january"):
		case strtolower("januari") : 
		case strtolower("jan") : 
			$bulan_angka = 1;
			break;
		default:
			$bulan_angka = Date('F');
			break;
	}
	
	return $bulan_angka;
}


function week_name($wek){
	$week = array(
		'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu','Minggu'
	);
	return $week[$wek];
}

/*
 * nama fungsi : month_name
 * description : nama bulan dalam bahasa indonesia
 */
function month_name($mon){
	$month = array( 
		'1'  => 'Januari', '2'  => 'Februari', '3'  => 'Maret', '4'  => 'April',
		'5'  => 'Mei', '6'  => 'Juni', '7'  => 'Juli', '8'  => 'Agustus',
		'9'  => 'September', '10' => 'Oktober',	'11' => 'November', '12' => 'Desember',
	);
	return $month[$mon];
}

/*
 * nama fungsi : get_hari
 * description : dropdown jumlah hari dalam 1 bulan
 */
function get_hari($int_hari){    
    switch ($int_hari) {
        case 1:
        case "Monday": 
            $int_hari = "Senin";
            break;
        case 2:
        case "Tuesday": 
            $int_hari = "Selasa";
            break;

        case 3:
        case "Wednesday": 
            $int_hari = "Rabu";
            break;
        case 4:
        case "Thursday":
            $int_hari = "Kamis";
            break;
        case 5:
        case "Friday":
            $int_hari = "Jumat";
            break;
        case 6:
        case "Saturday":
            $int_hari = "Sabtu";
            break;
        default:
            $int_hari = "Minggu";
            break;
    }

    return $int_hari;
} 

function sirs_get_hari($name_element, $selected='', $class='', $id='', $element='', $multi=''){
	$array = array(
		'00' => '---',
		'01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', 
		'06' => '06', '07' => '07', '08' => '08', '09' => '09', '10' => '10',
		'11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', 
		'16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', 
		'21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25',
		'26' => '26', '27' => '27',	'28' => '28', '29' => '29', '30' => '30', 
		'31' => '31'
	);
	$name_element = ($name_element=='') ? 'DD' : $name_element;
	return form_dropdown($name_element, $array, $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
}

/*
 * nama fungsi : get_bulan
 * description : dropdown nama bulan dalam bahasa indonesia
 */
function get_bulan($bulan){
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
            case "feb":
            case "february":
                $bulan = "Februari";
                break;
            case 3:
            case "MAR":
            case "MARCH":
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
            case "SEP":
                $bulan = "September";
                break;
            case 10:
            case "oct": 
            
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;
            default:
                $bulan = Date('F');
                break;
        }
        return $bulan;
    }
    
function sirs_get_bulan($name_element, $selected='', $class='', $id='', $element='', $multi=''){
	$array = array( 
		'00' => '---',
		'01' => 'JANUARI', '02' => 'FEBRUARI',
	 	'03' => 'MARET', '04' => 'APRIL',
	 	'05' => 'MEI', '06' => 'JUNI',
	 	'07' => 'JULI', '08' => 'AGUSTUS',
	 	'09' => 'SEPTEMBER', '10' => 'OKTOBER',
	 	'11' => 'NOVEMBER', '12' => 'DESEMBER',
	);
	$name_element = ($name_element=='') ? 'MM' : $name_element;
	$selected = ($selected=='') ? date('n') : $selected;
	return form_dropdown($name_element, $array, $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
}

/*
 * nama fungsi : get_tahun
 * description : dropdown untuk menampilkan tahun sesuai yang ditentukan
 */
function get_tahun($name_element, $selected='', $class='', $id='', $element='', $start=''){
	$start      = ($start=='') ? 1960 : $start;
	$current    = date('Y');
	$array['0'] = '---';
	for($start ; $start <= $current; $start++){
		$array[$start] = $start;
	}
	$name_element = ($name_element=='') ? 'YYYY' : $name_element;
	$selected = ($selected=='') ? date('n') : $selected;
	return form_dropdown($name_element, $array, $selected, 'class="'.$class.'" id="'.$id.'" '.$element);
}

/*
 * nama fungsi : get_jam
 * description : dropdown untuk menampilkan jam
 */
function get_jam($name, $id='', $class='', $selected=''){
	$start = 0;
	for($start ; $start <= 23; $start++){
		$array[$start] = str_pad($start, 2, 0, STR_PAD_LEFT);
	}
	return form_dropdown($name, $array, date('G'),'class=filter_select');	
}

/*
 * nama fungsi : get_menit
 * description : dropdown untuk menampikan menit
 */
function get_menit($name, $id='', $class='', $selected=''){
	$start = 0;
	for($start ; $start <= 59; $start++){
		$array[$start] = str_pad($start, 2, 0, STR_PAD_LEFT);
	}
	return form_dropdown($name, $array, date('i'),'class=filter_select');
}

/*
 * nama fungsi : split_input_time
 * description : 
 */
function split_input_time($time){
	$jam = substr($time, 0, 2);
	$menit = substr($time, 2, 2);
	$detik = substr($time, 4, 2);
	$detik = ($detik == null) ? '0' : $detik;
	return array(
		'jam' => (int) $jam, 
		'menit' => (int) $menit, 
		'detik' => (int) $detik
	);
}

/*
 * nama fungsi : split_input_date
 * description : 
 */
function split_input_date($date, $format){
	switch ($format) {
		case 'dd/mm/yyyy': case 'dd-mm-yyyy':
			$tgl = substr($date, 0, 2);
			$bulan = substr($date, 3, 2);
			$tahun = substr($date, 6, 4);
			break;
		case 'ddmmyyyy':
			$tgl = substr($date, 0, 2);
			$bulan = substr($date, 2, 2);
			$tahun = substr($date, 4, 4);
			break;
		case 'mm/dd/yyyy': case 'mm-dd-yyyy':
			$tgl = substr($date, 3, 2);
			$bulan = substr($date, 0, 2);
			$tahun = substr($date, 6, 4);
			break;
		case 'mmddyyyy':
			$tgl = substr($date, 2, 2);
			$bulan = substr($date, 0, 2);
			$tahun = substr($date, 4, 4);
			break;
		case 'yyyy/mm/dd': case 'yyyy-mm-dd':
			$tgl = substr($date, 8, 2);
			$bulan = substr($date, 5, 2);
			$tahun = substr($date, 0, 4);
			break;
		case 'yyyymmdd':
			$tgl = substr($date, 6, 2);
			$bulan = substr($date, 4, 2);
			$tahun = substr($date, 0, 4);
			break;
		case 'yyyy/dd/mm': case 'yyyy-dd-mm':
			$tgl = substr($date, 5, 2);
			$bulan = substr($date, 8, 2);
			$tahun = substr($date, 0, 4);
			break;
		case 'yyyyddmm':
			$tgl = substr($date, 4, 2);
			$bulan = substr($date, 6, 2);
			$tahun = substr($date, 0, 4);
			break;
		default:
			$tgl = null;
			$bulan = null;
			$tahun = null;
			break;
	}
	return array(
		'tgl' => (int) $tgl, 
		'bulan' => (int) $bulan, 
		'tahun' => (int) $tahun
	);
}

/*
 * nama fungsi : check_is_lampau
 * description : periksa apakah tanggal parameter sudah lampau
 */
function check_is_lampau($tanggal_input, $waktu_toleransi){
	$today = date('w');
	$tanggal_today = date('Y-m-d');
	$tanggal = split_date($tanggal_input);
	$tanggal_input = mktime(0,0,0, $tanggal['bulan'], $tanggal['tgl'], $tanggal['tahun']);
	$tanggal_input = date('Y-m-d', $tanggal_input);
	$interval = date_diff(date_create($tanggal_today), date_create($tanggal_input));
	switch ($today) {
		case '5': case '6' : case '7':
			$waktu_toleransi = $waktu_toleransi+1;
			break;
		default:
			$waktu_toleransi = $waktu_toleransi;
			break;
	}
	try{
		if($interval->invert == 1) throw new Exception();
		if($interval->days < $waktu_toleransi) throw new Exception();
		return false;
	}catch(Exception $e){
		return true;
	}
}