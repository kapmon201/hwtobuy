<?php
/*

*/

if (!function_exists('is_kosong')) {
    function is_kosong($param_str) {
        if ($param_str==null || $param_str=="") : 
            return "-";
        endif; 
        
        return $param_str; 
    }
}

function get_sex($str) {
    if (is_kosong($str)=="-") : 
        return "-"; 
        exit; 
    endif; 

    if ($str=="L") :
        return "Laki-laki"; 
    else : 
        return "Perempuan";
    endif;  
}



if (!function_exists('get_tanggal')) {
    function get_tanggal($tanggal) {
        $a = explode('-',$tanggal);
        $tanggal = $a['2']." ".get_bulan($a['1'])." ".$a['0'];
        return $tanggal;
    }

}

function sapa() {
    date_default_timezone_set("Asia/Jakarta");

    $jam = date('H:i');

    if ($jam > '05:30' && $jam < '10:00') : 
        $salam = 'pagi';
    elseif ($jam >= '10:00' && $jam < '15:00') : 
        $salam = 'siang';
    elseif ($jam >= '15:00' && $jam < '18:00') :
        $salam = 'sore';
    else :
        $salam = 'malam';
    endif; 

    return "Selamat ".$salam;
}




if (!function_exists('calc_age')) {
    function calc_age($tanggal_lahir){
        $birth_date = new DateTime($tanggal_lahir);
        $today = new DateTime("today");

        if ($birth_date > $today) { 
            exit("0 tahun 0 bulan 0 hari");
        }

        $y = $today->diff($birth_date)->y;
        $m = $today->diff($birth_date)->m;
        $d = $today->diff($birth_date)->d;

        return $y." tahun ".$m." bulan ".$d." hari";
    }
}

function get_dayofweek($arr){   
    // mm, dd, yyyy 
    

    $jd=gregoriantojd($arr[0],$arr[1],$arr[2]);
    return jddayofweek($jd,1);
}

/* 

*/

function comp_date($arr) {
    if (( strtotime($arr[0]) > strtotime($arr[1]))!=1 || ( strtotime($arr[0]) > strtotime($arr[1]))!=true) : 
        return false ; 
    else : 
        return true; 
    endif; 
}

//inisial asal_pasien : IRJ=instalasi rawat jalan , ird =.. iri 

function get_privilegetype($int){    
    switch ($int) {
        case 0:
            $privilege = "Super User";
            break;
        case 1:
            $privilege = "Admin";
            break;
        case 2:
            $privilege = "Operator";
            break;
        default:
            $privilege = "Undefined";
            break;
    } 
    return $privilege;    
}

// START: URM 
if (!function_exists('urm_get_fleck')) {
    function urm_get_fleck($str_fleck){
/*
        1 = sudah diperiksa
2 = belum diperiksa
3 = tidak datang
4 = batal
5 = sedang diperiksa
6 = sudah ditindak
7 = belum ditindak
8 = berkas belum lengkap
*/

        switch ($str_fleck) {
            case 1:
                $str_fleck = "SUDAH DIPERIKSA";
                break;
            case 2:
                $str_fleck = "BELUM DIPERIKSA";
                break;
            case 3:
                $str_fleck = "TIDAK DATANG";
                break;
            case 4:
                $str_fleck = "BATAL";
                break;
            case 5:
                $str_fleck = "SEDANG DIPERIKSA";
                break;
            case 6:
                $str_fleck = "SUDAH DITINDAK";
                break;
            case 7:
                $str_fleck = "BELUM DITINDAK";
                break;
            default:
                $str_fleck = "BERKAS BELUM LENGKAP";
                break;
        }
        return $str_fleck;
    }
}    



if (!function_exists('my_looping')) {
    function my_looping(string $param_str) {
        $strings=["","suzuki","mitsubishi","honda","toyota","daihatsu"];

        foreach ($strings as $string) :
            if (empty($param_str)) continue; // bakal exit 

            // kalau sebaris, if bisa ditulis sbb: 
            if ($param_str==="avanza") return "toyota"; 
            elseif ($param_str==="xenia") return "daihatsu"; 
            elseif ($param_str==="pajero") return "misubishi"; 
            elseif ($param_str==="mobilio") return "honda"; 
            else return "suzuki"; 
        endforeach;     
    }
}
    


    function demoLoopingA(string $param_str) {
         

        $booleans[0]=false; 

        foreach ($strings as $var_key => $var_string ) : 
            // if ($booleans[0]===false) : 
            if ($var_string === "avanza") : 
                echo "ketemu di key: ".$var_key.PHP_EOL; 
                // $booleans[0]=true; 
                break; 
            endif; 
            // endif; 
        endforeach; 
    }

    function demoSwitch(string $param_str) {
        global $strings; 

        switch ($param_str) {
            case "mio" : 
            case "nmax" :
            case "xmax" : 
                $strings[0]="yamaha";
                break; 

            case "beat" : 
            case "vario" :
            case "pcx" : 
                $strings[0]="honda";
                break;   

            default: 
                $strings[0]="undefined vendor";
                break;  
        }

        return $strings[0]; 
    }   

    function luasBangunDatar(string $param_str)  {
        global $strings; 

        switch ($param_str) {
            case "segitiga" : 
            case "triangle" :

                $strings[0]="yamaha";
                break; 

            case "beat" : 
            case "vario" :
            case "pcx" : 
                $strings[0]="honda";
                break;   

            default: 
                $strings[0]="undefined vendor";
                break;  
        }

        return $strings[0]; 
    }

    function luasSegitiga(array $param_arr){
        $this->ints[0]=($param_arr[0]*$param_arr[1])/2; 
        return round($this->ints[0]); 
    }
