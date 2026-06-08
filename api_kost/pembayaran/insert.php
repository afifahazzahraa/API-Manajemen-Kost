<?php
header("Content-Type: application/json");
include "../koneksi.php";

if (isset($_GET['id_kamar']) && isset($_GET['id_penghuni']) && isset($_GET['tanggal_pembayaran']) && isset($_GET['jumlah_pembayaran']) && isset($_GET['status_pembayaran'])) {
    
    $id_kmr  = $_GET['id_kamar'];
    $id_pgh  = $_GET['id_penghuni'];
    $tgl_bdr = $_GET['tanggal_pembayaran'];
    $jumlah  = $_GET['jumlah_pembayaran'];
    $status  = $_GET['status_pembayaran'];

    $query = mysqli_query($conn, "INSERT INTO pembayaran (id_kamar, id_penghuni, tanggal_pembayaran, jumlah_pembayaran, status_pembayaran) 
                                  VALUES ('$id_kmr', '$id_pgh', '$tgl_bdr', '$jumlah', '$status')");

    if ($query) {
        $response = [
            "success" => true,
            "message" => "Berhasil mencatat data pembayaran"
        ];
    } else {
        $response = [
            "success" => false,
            "message" => "Gagal mencatat data pembayaran: " . mysqli_error($conn)
        ];
    }
} else {
    $response = [
        "success" => false,
        "message" => "Gagal, parameter data pembayaran tidak lengkap pada URL"
    ];
}

echo json_encode($response, JSON_PRETTY_PRINT);
?>