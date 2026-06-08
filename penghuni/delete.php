<?php
header("Content-Type: application/json");
include "../config/koneksi.php";

$data=json_decode(file_get_contents("php://input"));

$sql="DELETE FROM penghuni
WHERE id_penghuni='$data->id_penghuni'";

if(mysqli_query($conn,$sql)){
    echo json_encode([
        "success" => true,
        "message" => "Data penghuni berhasil dihapus"
    ], JSON_PRETTY_PRINT);
}
?>