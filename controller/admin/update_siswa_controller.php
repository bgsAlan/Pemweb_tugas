<?php 
session_start();
require __DIR__."/../../config/db.php";
$error = "";
$success = "";
//Cek apakah data data yang dikirim
if(isset($_POST['submit'])) {
    $siswa_id = $_POST['siswa_id'];
    $kelas = $_POST['kelas'];
    if (empty($kelas)) {
        $_SESSION['error'] = "Kelas wajib dipilih";
        header("Location: ../view/admin/kelolaSiswa/edit_siswa_view.php?id=$siswa_id");
        exit;
    }
    //update sql
    $query = mysqli_query($conn, "
        UPDATE siswa
        SET Kelas = '$kelas'
        WHERE id = '$siswa_id'
    ");

    if ($query) {
        $_SESSION['success'] = "Data siswa berhasil diupdate";
    } else {
        $_SESSION['error'] = "Data siswa gagal diupdate";
    }

    header("Location: ../../view/admin/kelolaSiswa/edit_siswa_view.php");
    exit;
}



?>