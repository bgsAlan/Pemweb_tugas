<?php
session_start();
require __DIR__ . '/../../../config/db.php';

// Guard
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Akses ditolak ngab!');
}

// 1. Nangkep Semua Data dari Form
$siswa_id    = $_POST['siswa_id'];
$mapel_id    = $_POST['mapel_id'];
$jenis_nilai = $_POST['jenis_nilai'];
$nilai       = $_POST['nilai'];

// 2. Cek Session Login
$user_id_login = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if (!$user_id_login) {
    die("Error: Session mati atau belum login.");
}

// 3. CARI GURU_ID ASLI BERDASARKAN USER_ID
$query_cari_guru = "SELECT id FROM guru WHERE user_id = ?";
$stmt_guru = mysqli_prepare($conn, $query_cari_guru);
mysqli_stmt_bind_param($stmt_guru, "i", $user_id_login);
mysqli_stmt_execute($stmt_guru);
$result_guru = mysqli_stmt_get_result($stmt_guru);

if ($row_guru = mysqli_fetch_assoc($result_guru)) {
    
    $guru_id = $row_guru['id'];
} else {
    die("Error: Akun user ini belum ada datanya di tabel guru!");
}
mysqli_stmt_close($stmt_guru);

// 4. Validasi Form
if (empty($siswa_id) || empty($mapel_id) || empty($jenis_nilai) || $nilai === '') {
    $_SESSION['error'] = "Semua field wajib diisi!";
    header("Location: /Pemweb_tugas/view/guru/input_nilai_view.php?id=$siswa_id");
    exit;
}

if ($nilai < 0 || $nilai > 100) {
    $_SESSION['error'] = "Nilai harus antara 0 sampai 100";
    header("Location: /Pemweb_tugas/view/guru/input_nilai_view.php?id=$siswa_id");
    exit;
}

// 5. Cek Duplikat Nilai 
$query_cek = "SELECT id FROM nilai WHERE siswa_id = ? AND mapel_id = ? AND jenis_nilai = ?";
$stmt_cek = mysqli_prepare($conn, $query_cek);
mysqli_stmt_bind_param($stmt_cek, "iis", $siswa_id, $mapel_id, $jenis_nilai);
mysqli_stmt_execute($stmt_cek);
mysqli_stmt_store_result($stmt_cek);

if (mysqli_stmt_num_rows($stmt_cek) > 0) {
    $_SESSION['error'] = "Nilai " . strtoupper($jenis_nilai) . " untuk mapel ini sudah pernah diinput!";
    header("Location: /Pemweb_tugas/view/guru/input_nilai_view.php?id=$siswa_id");
    exit;
}
mysqli_stmt_close($stmt_cek);

// 6. INSERT DATA 
$query_insert = "INSERT INTO nilai (siswa_id, guru_id, mapel_id, jenis_nilai, nilai) VALUES (?, ?, ?, ?, ?)";
$stmt_insert = mysqli_prepare($conn, $query_insert);
mysqli_stmt_bind_param($stmt_insert, "iiisi", $siswa_id, $guru_id, $mapel_id, $jenis_nilai, $nilai);

if (mysqli_stmt_execute($stmt_insert)) {
    $_SESSION['success'] = "Mantul! Nilai berhasil disimpan ";
    header("Location: /Pemweb_tugas/view/guru/data_nilai_view.php");
} else {
    $_SESSION['error'] = "Gagal menyimpan nilai: " . mysqli_error($conn);
    header("Location: /Pemweb_tugas/view/guru/input_nilai_view.php?id=$siswa_id");
}

mysqli_stmt_close($stmt_insert);
exit;
