<?php

session_start();
require(__DIR__ . '/../../../config/db.php');

$query = mysqli_query(
    $conn,
    "UPDATE presensi
SET status='ditutup'
WHERE status='aktif'"
);

if ($query) {

    $_SESSION['success'] =
        "Presensi berhasil ditutup";
} else {

    $_SESSION['error'] =
        "Gagal menutup presensi";
}

header("Location: /Pemweb_tugas/view/admin/presensi/open_presensi_view.php");
exit;