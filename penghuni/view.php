<?php

header("Content-Type: application/json");

include "../config/koneksi.php";

$query = mysqli_query($conn,"
    SELECT 
        p.id_penghuni,
        p.nama_penghuni,
        p.nomor_hp,
        p.tanggal_masuk,
        k.nomor_kamar
    FROM penghuni p
    JOIN kamar k ON p.id_kamar = k.id_kamar
");

$data = [];

while($row = mysqli_fetch_assoc($query)){
    $data[] = $row;
}

$response = [
    "success" => true,
    "message" => "Berhasil mengambil data penghuni",
    "data" => $data
];

echo json_encode($response, JSON_PRETTY_PRINT);

?>