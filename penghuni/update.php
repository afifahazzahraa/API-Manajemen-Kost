<?php
header("Content-Type: application/json");
include "../config/koneksi.php";

$data=json_decode(file_get_contents("php://input"));

$sql="UPDATE penghuni SET
nama_penghuni='$data->nama_penghuni',
nomor_hp='$data->nomor_hp',
tanggal_masuk='$data->tanggal_masuk',
id_kamar='$data->id_kamar'
WHERE id_penghuni='$data->id_penghuni'";

if(mysqli_query($conn,$sql)){
    echo json_encode([
        "success" => true,
        "message" => "Data penghuni berhasil diperbarui"
    ], JSON_PRETTY_PRINT);
}
?>