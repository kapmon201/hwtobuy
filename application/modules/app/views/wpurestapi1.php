<?php
$mhs = [
    [
        "npm" => "1083177",
        "nama" => "taufik hilmi",
        "email" => "hilmi@gmail.com"
    ],
    [
        "npm" => "1083180",
        "nama" => "arifin h",
        "email" => "arifin@gmail.com"
    ]
];

// echo "var array associative mhs: ";
// var_dump($mhs);
// echo "<br>";

echo "arr assoc: mhs: <br>";
var_dump($mhs);

$hasil = json_encode($mhs);
echo "hasil json_encode(mhs) dari arr mhs: <br>";
var_dump($hasil);
echo "<hr>";

$users = $this->db->query("select * from adadoks_user")->result_array();
$json_users = json_encode($users);
echo "hasil json_encode(mhs) dari hasil query berupa arr assoc: <br>";
var_dump($json_users);
echo "<hr>";
