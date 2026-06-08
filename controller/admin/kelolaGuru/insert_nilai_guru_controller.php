<?php
session_start();
require __DIR__ . '/../../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Akses ditolak');
}

$siswa_id = $_POST['siswa_id'];
$mapel_id = $_POST['mapel_id'];
$nilai    = $_POST['nilai'];

// Validasi
if (empty($siswa_id) || empty($mapel_id) || $nilai === '') {
    $_SESSION['error'] = "Semua field wajib diisi";
    header("Location: /Pemweb_tugas/view/guru/input_nilai_view.php?id=$siswa_id");
    exit;
}

// Validasi nilai 0-100
if ($nilai < 0 || $nilai > 100) {
    $_SESSION['error'] = "Nilai harus antara 0 sampai 100";
    header("Location: /Pemweb_tugas/view/guru/input_nilai_view.php?id=$siswa_id");
    exit;
}

// Cek apakah nilai untuk mapel tersebut sudah ada
$cek = mysqli_query(
    $conn,
    "SELECT id
     FROM nilai
     WHERE siswa_id = '$siswa_id'
     AND mapel_id = '$mapel_id'"
);

if (mysqli_num_rows($cek) > 0) {
    $_SESSION['error'] = "Nilai mata pelajaran ini sudah pernah diinput";
    header("Location: /Pemweb_tugas/view/guru/input_nilai_view.php?id=$siswa_id");
    exit;
}

// Simpan
$query = mysqli_query(
    $conn,
    "INSERT INTO nilai (siswa_id, mapel_id, nilai)
     VALUES ('$siswa_id', '$mapel_id', '$nilai')"
);

if ($query) {
    $_SESSION['success'] = "Nilai berhasil disimpan";
    header("Location: /Pemweb_tugas/view/guru/data_nilai_view.php");
} else {
    $_SESSION['error'] = "Gagal menyimpan nilai";
    header("Location: /Pemweb_tugas/view/guru/input_nilai_view.php?id=$siswa_id");
}
exit;
