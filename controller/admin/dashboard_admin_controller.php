<?php

require __DIR__ . "/../../config/db.php";

$query_siswa = mysqli_query($conn, "
    SELECT COUNT(*) AS total_siswa
    FROM siswa
");

$total_siswa = mysqli_fetch_assoc($query_siswa);

$query_guru = mysqli_query($conn, "
    SELECT COUNT(*) AS total_guru
    FROM guru
");

$total_guru = mysqli_fetch_assoc($query_guru);
