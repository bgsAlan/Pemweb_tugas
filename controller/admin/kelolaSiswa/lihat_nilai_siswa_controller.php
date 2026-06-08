<?php

require __DIR__ . '/../../../config/db.php';

// Cek session - redirect ke login kalau belum login
if (!isset($_SESSION['user_id'])) {
    header("Location: /Pemweb_tugas/view/auth/login_view.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Ambil data siswa berdasarkan user login
$get_siswa = mysqli_query($conn, "
    SELECT id, nisn, nama
    FROM siswa
    WHERE user_id = '$user_id'
");

$siswa = mysqli_fetch_assoc($get_siswa);

if (!$siswa) {
    // Data siswa tidak ditemukan untuk user ini
    $get_nilai = null;
} else {
    $siswa_id = $siswa['id'];

    // Ambil nilai siswa
    $get_nilai = mysqli_query($conn, "
        SELECT n.nilai, s.nisn, s.nama AS nama_siswa, mp.nama AS nama_mapel
        FROM nilai n
        JOIN siswa s ON n.siswa_id = s.id
        JOIN mata_pelajaran mp ON n.mapel_id = mp.id
        WHERE n.siswa_id = '$siswa_id'
        ORDER BY mp.nama ASC
    ");
}
