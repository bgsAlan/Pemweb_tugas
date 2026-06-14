<?php

session_start();

require(__DIR__ . '/../../../config/db.php');

if (!isset($_SESSION['user_id'])) {
    die("User belum login");
}

$user_id = $_SESSION['user_id'];

// Query di-update: Hapus filter status biar riwayat tetep muncul
$sql = "
SELECT *
FROM presensi
WHERE status = 'aktif'
AND (
    target = 'siswa'
    OR target = 'semua'
)
ORDER BY id DESC
";

$result = mysqli_query($conn, $sql);
