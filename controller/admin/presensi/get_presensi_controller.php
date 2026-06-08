<?php

require(__DIR__ . '/../../../config/db.php');

// ambil semua presensi aktif
$query = mysqli_query(
    $conn,

    "SELECT * FROM presensi

    WHERE status='aktif'

    ORDER BY id DESC"
);
?>