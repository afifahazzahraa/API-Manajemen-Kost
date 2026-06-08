<?php
include "../koneksi.php";

$nomor_kamar = $_POST['nomor_kamar'] ?? '';
$tipe_kamar  = $_POST['tipe_kamar'] ?? '';
$harga       = $_POST['harga'] ?? '';

if ($nomor_kamar == '' || $tipe_kamar == '' || $harga == '') {
    echo json_encode([
        "status" => false,
        "message" => "Semua data wajib diisi"
    ]);
    exit;
}

$query = "INSERT INTO kamar (nomor_kamar, tipe_kamar, harga)
          VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param(
    $stmt,
    "ssi",
    $nomor_kamar,
    $tipe_kamar,
    $harga
);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode([
        "status" => true,
        "message" => "Data kamar berhasil ditambahkan"
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Data kamar gagal ditambahkan"
    ]);
}
?>