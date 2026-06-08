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

// 1. Ambil total presensi yang statusnya masih 'aktif'
$query_aktif = mysqli_query($conn, "SELECT COUNT(*) as total FROM presensi WHERE status = 'aktif'");
$presensi_aktif = mysqli_fetch_assoc($query_aktif);

// 2. Ambil total orang yang 'hadir' hari ini
$tanggal_hari_ini = date('Y-m-d');
$query_hadir = mysqli_query($conn, "
    SELECT COUNT(*) as total 
    FROM presensi_detail pd 
    JOIN presensi p ON pd.presensi_id = p.id 
    WHERE pd.status_kehadiran = 'hadir' AND p.tanggal = '$tanggal_hari_ini'
");
$hadir_hari_ini = mysqli_fetch_assoc($query_hadir);

// Asumsi lo punya tabel 'siswa' dan 'guru' yang berelasi ke tabel 'users' via 'user_id'
$query_terbaru = mysqli_query($conn, "
    SELECT 
        COALESCE(s.nama, g.nama, u.email) AS nama, 
        COALESCE(s.kelas, g.nip, '-') AS kelas, 
        pd.status_kehadiran, 
        p.tanggal 
    FROM presensi_detail pd
    JOIN presensi p ON pd.presensi_id = p.id
    JOIN users u ON pd.user_id = u.id
    LEFT JOIN siswa s ON u.id = s.user_id 
    LEFT JOIN guru g ON u.id = g.user_id
    ORDER BY pd.id DESC 
    LIMIT 5
");
