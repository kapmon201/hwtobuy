<?php
$json_decode1 = json_decode(file_get_contents(_A_C_JS . 'wpu_restapisatu.json'));

echo "hasil json_decode dari file_get_content file wpu_restapisatu.json: <br>";
var_dump($json_decode1);
echo "<hr>";
echo "hasil json_decode dng param true dari file_get_content file wpu_restapisatu.json: <br>";

$json_decode2 = json_decode(file_get_contents(_A_C_JS . 'wpu_restapisatu.json'), true);
var_dump($json_decode2);
echo "<hr>";

echo $json_decode2[1]["pembimbing"]["utama"];
