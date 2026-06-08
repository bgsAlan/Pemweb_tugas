<?php

require __DIR__ . "/../../../config/db.php";

$search = $_GET['search'] ?? '';
$mapel  = $_GET['mapel'] ?? '';

$sql = "SELECT * FROM guru WHERE 1=1";

if (!empty($search)) {
    $sql .= " AND (
        nama LIKE '%$search%' OR
        nisn LIKE '%$search%'
    )";
}

if (!empty($mapel)) {
    $sql .= " AND mapel = '$mapel'";
}

$get_guru = mysqli_query($conn, $sql);
