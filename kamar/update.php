<?php
include "../koneksi.php";

$id_kamar    = $_POST['id_kamar'] ?? '';
$nomor_kamar = $_POST['nomor_kamar'] ?? '';
$tipe_kamar  = $_POST['tipe_kamar'] ?? '';
$harga       = $_POST['harga'] ?? '';

if ($id_kamar == '' || $nomor_kamar == '' || $tipe_kamar == '' || $harga == '') {
    echo json_encode([
        "status" => false,
        "message" => "Semua data wajib diisi"
    ]);
    exit;
}

$query = "UPDATE kamar
          SET nomor_kamar = ?, tipe_kamar = ?, harga = ?
          WHERE id_kamar = ?";

$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param(
    $stmt,
    "ssis",
    $nomor_kamar,
    $tipe_kamar,
    $harga,
    $id_kamar
);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode([
        "status" => true,
        "message" => "Data kamar berhasil diupdate"
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Data kamar gagal diupdate"
    ]);
}
?>