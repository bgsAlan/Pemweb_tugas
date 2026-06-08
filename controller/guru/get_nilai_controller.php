<?php
// Gausah session_start() lagi disini karena di view udah dipanggil
require_once __DIR__ . '/../../config/db.php';

//Ambil User ID dari session
$user_id_login = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if (!$user_id_login) {
    die("Error: Session mati, silahkan login ulang.");
}

// 2. Cari Guru ID 
$query_cari_guru = "SELECT id FROM guru WHERE user_id = ?";
$stmt_guru = mysqli_prepare($conn, $query_cari_guru);
mysqli_stmt_bind_param($stmt_guru, "i", $user_id_login);
mysqli_stmt_execute($stmt_guru);
$result_guru = mysqli_stmt_get_result($stmt_guru);

if ($row_guru = mysqli_fetch_assoc($result_guru)) {
    $guru_id = $row_guru['id'];
} else {
    die("Error: Akun belum terhubung dengan data guru.");
}
mysqli_stmt_close($stmt_guru);

// 3. LOGIC PENCARIAN (FILTER NAMA & JENIS NILAI)
$search_nama  = isset($_GET['nama']) ? trim($_GET['nama']) : '';
$filter_jenis = isset($_GET['jenis_nilai']) ? $_GET['jenis_nilai'] : '';


$query_nilai = "SELECT s.nisn, s.nama AS nama_siswa, mp.nama AS nama_mapel, n.jenis_nilai, n.nilai 
                FROM nilai n
                INNER JOIN siswa s ON n.siswa_id = s.id
                INNER JOIN mata_pelajaran mp ON n.mapel_id = mp.id
                WHERE n.guru_id = ?";

$types = "i"; 
$params = [$guru_id];

if (!empty($search_nama)) {
    $query_nilai .= " AND s.nama LIKE ?";
    $types .= "s";
    $params[] = "%" . $search_nama . "%";
}

if (!empty($filter_jenis)) {
    $query_nilai .= " AND n.jenis_nilai = ?";
    $types .= "s";
    $params[] = $filter_jenis;
}

$query_nilai .= " ORDER BY n.created_at DESC";

// 4. Eksekusi Query Dinamis
$stmt_nilai = mysqli_prepare($conn, $query_nilai);

mysqli_stmt_bind_param($stmt_nilai, $types, ...$params);

mysqli_stmt_execute($stmt_nilai);
$get_nilai = mysqli_stmt_get_result($stmt_nilai);

// Selesai! Datanya siap di-looping di view.
