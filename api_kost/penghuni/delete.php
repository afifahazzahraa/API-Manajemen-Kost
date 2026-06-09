<?php
header("Content-Type: application/json");
include "koneksi.php";

$data = json_decode(file_get_contents("php://input"));

if (!$data) {
    echo json_encode([
        "success" => false,
        "message" => "Tidak ada data yang dikirim"
    ], JSON_PRETTY_PRINT);
    exit;
}

if (empty($data->id_penghuni)) {
    echo json_encode([
        "success" => false,
        "message" => "ID penghuni wajib diisi"
    ], JSON_PRETTY_PRINT);
    exit;
}

$sql = "DELETE FROM penghuni
        WHERE id_penghuni = '$data->id_penghuni'";

if (mysqli_query($conn, $sql)) {

    if (mysqli_affected_rows($conn) > 0) {
        echo json_encode([
            "success" => true,
            "message" => "Data penghuni berhasil dihapus"
        ], JSON_PRETTY_PRINT);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Data penghuni tidak ditemukan"
        ], JSON_PRETTY_PRINT);
    }

} else {

    echo json_encode([
        "success" => false,
        "message" => "Gagal menghapus data penghuni",
        "error" => mysqli_error($conn)
    ], JSON_PRETTY_PRINT);

}

mysqli_close($conn);
?>