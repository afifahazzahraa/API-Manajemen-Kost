<?php

$host = "sql302.infinityfree.com";
$user = "if0_41601147";
$pass = "webkerin26";
$db   = "if0_41601147_manajemen_kos";

$conn = mysqli_connect($host,$user,$pass,$db);

if(!$conn){
    die("Koneksi Gagal");
}
?>