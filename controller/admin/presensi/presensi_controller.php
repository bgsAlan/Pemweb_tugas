<?php
session_start();
require("../../../config/db.php");
//Membuka presensi
if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $target = $_POST["target"];
    $desc = $_POST["description"];

    //Cek apakah ada presensi aktif
    if ($target == 'guru') {

        $check = mysqli_query(
            $conn,

            "SELECT * FROM presensi

        WHERE status='aktif'

        AND (
            target='guru'
            OR target='semua'
        )"
        );
    } else if ($target == 'murid') {

        $check = mysqli_query(
            $conn,

            "SELECT * FROM presensi

        WHERE status='aktif'

        AND (
            target='murid'
            OR target='semua'
        )"
        );
    } else {

        $check = mysqli_query(
            $conn,

            "SELECT * FROM presensi
        WHERE status='aktif'"
        );
    }

    // kalau masih ada presensi aktif
    if (mysqli_num_rows($check) > 0) {

        $_SESSION['error'] =
            "Masih ada presensi aktif untuk target tersebut";

        header("Location: /pemweb_tugas/view/admin/presensi/open_presensi_view.php");
        exit;
    }
    //Kirim ke presensi
    $sql_presensi = "INSERT INTO presensi(judul,target,tanggal,jam_dibuka,keterangan) VALUES ('$title','$target','$date','$time','$desc');";

    $query_presensi = mysqli_query($conn, $sql_presensi);

    if ($query_presensi) {

        $_SESSION['success'] = "Presensi berhasil dibuka";

        header("Location: /pemweb_tugas/view/admin/presensi/open_presensi_view.php");
        exit;
    } else {

        $_SESSION['error'] = "Gagal membuka presensi";

        header("Location: /pemweb_tugas/view/admin/presensi/open_presensi_view.phpp");
        exit;
    }
}