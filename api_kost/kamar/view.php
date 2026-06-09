<?php
include "../koneksi.php";

$query = "SELECT * FROM kamar";
$result = mysqli_query($conn, $query);

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

header('Content-Type: application/json');

echo json_encode($data, JSON_PRETTY_PRINT);
?>