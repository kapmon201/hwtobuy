<?php
/*
$mahasiswa = [
[
	"nama" => "hilmi",
	"nim" => "1083177",
	"email" => "taufikhilmi201@gmail.com"
],
[
	"nama" => "taufik",
	"nim" => "1083178",
	"email" => "taufik@live.com"
],
]; 
*/

$dbh = new PDO('mysql:host=localhost;dbname=wpu', 'root', '');
$db = $dbh->prepare('select * from ajax_mahasiswa');
$db->execute();
$user = $db->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($user);
