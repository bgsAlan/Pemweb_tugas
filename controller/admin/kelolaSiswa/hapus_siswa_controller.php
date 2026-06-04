<?php
session_start();
require __DIR__ . "/../../../config/db.php";
if (isset($_GET['id'])) {

    $siswa_id = $_GET['id'];

    // Ambil data siswa
    $query = mysqli_query($conn, "
        SELECT user_id
        FROM siswa
        WHERE id = '$siswa_id'
    ");

    $siswa = mysqli_fetch_assoc($query);

    if ($siswa) {

        $user_id = $siswa['user_id'];

        // Hapus siswa
        mysqli_query($conn, "
            DELETE FROM siswa
            WHERE id = '$siswa_id'
        ");

        // Hapus user login
        mysqli_query($conn, "
            DELETE FROM users
            WHERE id = '$user_id'
        ");

        $_SESSION['success'] = "Data siswa berhasil dihapus";
    } else {

        $_SESSION['error'] = "Data siswa tidak ditemukan";
    }

    header("Location: ../../../view/admin/kelolaSiswa/tambahSiswa_view.php");
    exit;
}
