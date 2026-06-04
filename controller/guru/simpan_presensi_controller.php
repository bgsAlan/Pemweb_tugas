<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../../config/db.php");

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $judul = $_POST['judul'];
    $target = $_POST['target'];
    $tanggal = $_POST['tanggal'];
    $jam_dibuka = $_POST['jam_dibuka'];
    $keterangan = $_POST['keterangan'];

    $sql = "
        INSERT INTO presensi
        (
            judul,
            target,
            tanggal,
            jam_dibuka,
            keterangan,
            status
        )
        VALUES
        (
            '$judul',
            '$target',
            '$tanggal',
            '$jam_dibuka',
            '$keterangan',
            'aktif'
        )
    ";

    $query = mysqli_query($conn, $sql);

    if ($query) {

        echo "
        <script>
            alert('Presensi berhasil dibuat');
            window.location='../../view/guru/dashboard_guru_view.php';
        </script>
        ";

    } else {

        echo "
        <script>
            alert('Gagal membuat presensi');
            history.back();
        </script>
        ";

    }
}
?>