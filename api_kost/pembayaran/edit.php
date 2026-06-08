<?php
header("Content-Type: application/json");
include "../koneksi.php";

if (isset($_GET['id_pembayaran']) && isset($_GET['id_kamar']) && isset($_GET['id_penghuni']) && isset($_GET['tanggal_pembayaran']) && isset($_GET['jumlah_pembayaran']) && isset($_GET['status_pembayaran'])) {
    
    $id      = $_GET['id_pembayaran'];
    $id_kmr  = $_GET['id_kamar'];
    $id_pgh  = $_GET['id_penghuni'];
    $tgl     = $_GET['tanggal_pembayaran'];
    $jumlah  = $_GET['jumlah_pembayaran'];
    $status  = $_GET['status_pembayaran'];

    $sql = "UPDATE pembayaran SET 
                id_kamar = '$id_kmr', 
                id_penghuni = '$id_pgh', 
                tanggal_pembayaran = '$tgl', 
                jumlah_pembayaran = '$jumlah', 
                status_pembayaran = '$status' 
            WHERE id_pembayaran = '$id'";

    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            $response = [
                "success" => true,
                "message" => "Berhasil memperbarui data pembayaran ID $id"
            ];
        } else {
            $response = [
                "success" => false,
                "message" => "Gagal, ID $id tidak ditemukan atau tidak ada perubahan data"
            ];
        }
    } else {
        $response = [
            "success" => false,
            "message" => "Error database: " . mysqli_error($conn)
        ];
    }
} else {
    $response = [
        "success" => false,
        "message" => "Gagal, parameter data edit pembayaran tidak lengkap pada URL"
    ];
}

echo json_encode($response, JSON_PRETTY_PRINT);
?>