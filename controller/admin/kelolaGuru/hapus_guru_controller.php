<?php
session_start();
require __DIR__ . "/../../../config/db.php";
if (isset($_GET['id'])) {

    $guru_id = $_GET['id'];

    // Ambil data siswa
    $query = mysqli_query($conn, "
        SELECT user_id
        FROM guru
        WHERE id = '$guru_id'
    ");

    $guru = mysqli_fetch_assoc($query);

    if ($guru) {

        $user_id = $guru['user_id'];

        // Hapus siswa
        mysqli_query($conn, "
            DELETE FROM guru
            WHERE id = '$guru_id'
        ");

        // Hapus user login
        mysqli_query($conn, "
            DELETE FROM users
            WHERE id = '$user_id'
        ");

        $_SESSION['success'] = "Data Guru berhasil dihapus";
    } else {

        $_SESSION['error'] = "Data Guru tidak ditemukan";
    }

    header("Location: ../../../view/admin/kelolaGuru/kelolaGuru_view.php");
    exit;
}
