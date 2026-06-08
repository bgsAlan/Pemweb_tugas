<?php

require __DIR__ . '/../../../config/db.php';;

$siswa_id = $_GET['id'];

// 1. QUERY AMBIL DATA SISWA 
$query_siswa = "SELECT id, nama, nisn FROM siswa WHERE id = ?";
$stmt_siswa = mysqli_prepare($conn, $query_siswa);
mysqli_stmt_bind_param($stmt_siswa, "i", $siswa_id);
mysqli_stmt_execute($stmt_siswa);
$siswa = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt_siswa));
mysqli_stmt_close($stmt_siswa);


// 2. QUERY CARI GURU_ID BERDASARKAN USER_ID SESSION LOGIN
$user_id_login = $_SESSION['user_id'];

$query_guru = "SELECT id FROM guru WHERE user_id = ?";
$stmt_guru = mysqli_prepare($conn, $query_guru);
mysqli_stmt_bind_param($stmt_guru, "i", $user_id_login);
mysqli_stmt_execute($stmt_guru);
$result_guru = mysqli_stmt_get_result($stmt_guru);
$guru = mysqli_fetch_assoc($result_guru);
mysqli_stmt_close($stmt_guru);


$guru_id_aktif = $guru['id'];


// 3. QUERY AMBIL MAPEL 
$query_mapel = "SELECT mp.id, mp.nama 
                FROM mata_pelajaran mp
                INNER JOIN guru_mapel gm ON mp.id = gm.mapel_id
                WHERE gm.guru_id = ?";

$stmt_mapel = mysqli_prepare($conn, $query_mapel);
mysqli_stmt_bind_param($stmt_mapel, "i", $guru_id_aktif);
mysqli_stmt_execute($stmt_mapel);

$get_mapel = mysqli_stmt_get_result($stmt_mapel);