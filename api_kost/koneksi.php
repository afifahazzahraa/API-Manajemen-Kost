<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
$host = "sql113.infinityfree.com";
$user = "if0_41601435";
$pass = "sukoharjo746";
$db = "if0_41601435_db_kost";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
