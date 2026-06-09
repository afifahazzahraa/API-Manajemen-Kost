<?php
include "../koneksi.php";

$id_kamar = $_POST['id_kamar'] ?? '';

if ($id_kamar == '') {
    echo json_encode([
        "status" => false,
        "message" => "ID Kamar tidak boleh kosong"
    ]);
    exit;
}

$query = "DELETE FROM kamar WHERE id_kamar = ?";

$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($stmt, "s", $id_kamar);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode([
        "status" => true,
        "message" => "Data kamar berhasil dihapus"
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Data kamar gagal dihapus"
    ]);
}
?>