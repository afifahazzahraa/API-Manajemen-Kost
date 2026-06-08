<?php
header("Content-Type: application/json");
include "../koneksi.php";

$query = mysqli_query($conn, "
    SELECT 
        p.id_pembayaran,
        k.nomor_kamar,
        h.nama_penghuni,
        p.tanggal_pembayaran,
        p.jumlah_pembayaran,
        p.status_pembayaran
    FROM pembayaran p
    JOIN kamar k ON p.id_kamar = k.id_kamar
    JOIN penghuni h ON p.id_penghuni = h.id_penghuni
");

$data = [];

while($row = mysqli_fetch_assoc($query)){
    $data[] = $row;
}

$response = [
    "success" => true,
    "message" => "Berhasil mengambil data pembayaran",
    "data" => $data
];

echo json_encode($response, JSON_PRETTY_PRINT);
?>