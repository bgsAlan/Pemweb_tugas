<?php

session_start();
require(__DIR__ . '/../../../config/db.php');

$sql_insert_alpha = "
    INSERT INTO presensi_detail (presensi_id, user_id, status_kehadiran)
    SELECT p.id, u.id, 'alpha'
    FROM presensi p
    JOIN users u ON (p.target = 'semua' OR p.target = u.role)
    LEFT JOIN presensi_detail pd ON p.id = pd.presensi_id AND u.id = pd.user_id
    WHERE p.status = 'aktif' AND pd.user_id IS NULL
";

// Jalanin auto-alpha
$execute_alpha = mysqli_query($conn, $sql_insert_alpha);

// 2. TUTUP SESINYA (Ini code asli lo)
$query = mysqli_query(
    $conn,
    "UPDATE presensi SET status='ditutup' WHERE status='aktif'"
);

// 3. KASIH FEEDBACK
if ($query && $execute_alpha) {
    $_SESSION['success'] = "Presensi sudah ditutup";
} else {
    $_SESSION['error'] = "Gagal menutup presensi atau update alpha";
}

header("Location: /Pemweb_tugas/view/admin/presensi/open_presensi_view.php");
exit;
