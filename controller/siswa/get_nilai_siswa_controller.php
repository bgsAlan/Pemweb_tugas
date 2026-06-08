<?php
// Gausah session_start() lagi disini karena di view udah dipanggil
require_once __DIR__ . '/../../config/db.php';

// 1. Ambil User ID dari session
$user_id_login = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if (!$user_id_login) {
    die("Error: Session mati, silahkan login ulang.");
}

// 2. Cari Siswa ID (Bukan Guru)
$query_cari_siswa = "SELECT id FROM siswa WHERE user_id = ?";
$stmt_siswa = mysqli_prepare($conn, $query_cari_siswa);
mysqli_stmt_bind_param($stmt_siswa, "i", $user_id_login);
mysqli_stmt_execute($stmt_siswa);
$result_siswa = mysqli_stmt_get_result($stmt_siswa);

if ($row_siswa = mysqli_fetch_assoc($result_siswa)) {
    $siswa_id = $row_siswa['id'];
} else {
    // Pesan error disesuaikan jadi data siswa
    die("Error: Akun belum terhubung dengan data siswa.");
}
mysqli_stmt_close($stmt_siswa);

// 3. LOGIC PENCARIAN (FILTER MAPEL & JENIS NILAI)
// Search diganti jadi cari Mapel biar lebih logis buat view Siswa
$search_mapel  = isset($_GET['mapel']) ? trim($_GET['mapel']) : '';
$filter_jenis = isset($_GET['jenis_nilai']) ? $_GET['jenis_nilai'] : '';

// Query difix: n.siswa_id = ?
$query_nilai = "SELECT s.nisn, s.nama AS nama_siswa, mp.nama AS nama_mapel, n.jenis_nilai, n.nilai 
                FROM nilai n
                INNER JOIN siswa s ON n.siswa_id = s.id
                INNER JOIN mata_pelajaran mp ON n.mapel_id = mp.id
                WHERE n.siswa_id = ?";

$types = "i";
$params = [$siswa_id];

// Logic pencarian difix: nyari nama_mapel
if (!empty($search_mapel)) {
    $query_nilai .= " AND mp.nama LIKE ?";
    $types .= "s";
    $params[] = "%" . $search_mapel . "%";
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
