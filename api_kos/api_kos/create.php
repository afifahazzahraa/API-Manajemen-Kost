<?php
header("Content-Type: application/json");
include "koneksi.php";

$data=json_decode(file_get_contents("php://input"));

$sql="INSERT INTO penghuni
(nama_penghuni,nomor_hp,tanggal_masuk,id_kamar)
VALUES
(
'$data->nama_penghuni',
'$data->nomor_hp',
'$data->tanggal_masuk',
'$data->id_kamar'
)";

if(mysqli_query($conn,$sql)){
    echo json_encode([
        "success" => true,
        "message" => "Data penghuni berhasil ditambahkan"
    ], JSON_PRETTY_PRINT);
}
?>