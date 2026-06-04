<?php
require __DIR__ . "/../../../config/db.php";

$id = $_GET['id'];

// Data guru
$get_guru = mysqli_query($conn, "
    SELECT *
    FROM guru
    WHERE id = '$id'
");

$guru = mysqli_fetch_assoc($get_guru);

// Semua mapel
$get_mapel = mysqli_query($conn, "
    SELECT *
    FROM mata_pelajaran
");

// Mapel yang dimiliki guru
$q_mapel_guru = mysqli_query($conn, "
    SELECT mapel_id
    FROM guru_mapel
    WHERE guru_id = '$id'
");

$selected = [];

while ($row = mysqli_fetch_assoc($q_mapel_guru)) {
    $selected[] = $row['mapel_id'];
}
