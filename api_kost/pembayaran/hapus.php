<?php
header("Content-Type: application/json");
include "../koneksi.php";

if (isset($_GET['id_pembayaran']) && !empty($_GET['id_pembayaran'])) {
    
    $id = $_GET['id_pembayaran'];

    $query = mysqli_query($conn, "DELETE FROM pembayaran WHERE id_pembayaran = '$id'");

    if ($query) {
        if (mysqli_affected_rows($conn) > 0) {
            $response = [
                "success" => true,
                "message" => "Berhasil menghapus data pembayaran dengan ID $id"
            ];
        } else {
            $response = [
                "success" => false,
                "message" => "Gagal, data pembayaran dengan ID $id tidak ditemukan"
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
        "message" => "Gagal, parameter 'id_pembayaran' tidak ditemukan pada URL"
    ];
}

echo json_encode($response, JSON_PRETTY_PRINT);
?>