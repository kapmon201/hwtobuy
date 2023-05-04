<?php
// folder/nama_file.json 
$data = file_get_contents(_A_C_JS . 'wpu_restapisatu.json');
/*
jika jadi objek: 
$mahasiswa = json_decode($data); 

jika jadi array: 
$mahasiswa = json_decode($data,TRUE); 
*/

$mahasiswa = json_decode($data, TRUE);

var_dump($mahasiswa);

echo "<br>";
echo $mahasiswa[1]["pembimbing"]["utama"];
