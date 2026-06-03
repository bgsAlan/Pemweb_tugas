<?php

require __DIR__ . "/../../config/db.php";

$search = $_GET['search'] ?? '';
$kelas  = $_GET['kelas'] ?? '';

$sql = "SELECT * FROM siswa WHERE 1=1";

if (!empty($search)) {
    $sql .= " AND (
        nama LIKE '%$search%' OR
        nisn LIKE '%$search%'
    )";
}

if (!empty($kelas)) {
    $sql .= " AND kelas = '$kelas'";
}

$get_siswa = mysqli_query($conn, $sql);
