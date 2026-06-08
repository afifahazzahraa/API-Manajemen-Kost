<?php
$host = "sql303.infinityfree.com";
$user = "if0_41601668";
$pass = "apriliaudb98";
$db   = "if0_41601668_kostdb";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error() );
}
?>