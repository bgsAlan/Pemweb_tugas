<?php
session_start();
require(__DIR__."/../../config/db.php");
$error = "";
$success = "";
if (isset($_POST["submit"])) {
    $name = $_POST["nama"];
    $email = $_POST["email"];
    $kelas = $_POST["kelas"];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nisn = $_POST["nisn"];

    // cek email
    $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($check_email) > 0) {
        $_SESSION['error'] = "Email sudah digunakan!";
        header("Location: ../../view/admin/kelolaSiswa/tambahSiswa_view.php");
        exit;
    }

    // cek nip
    $check_nisn = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn = '$nisn'");

    if (mysqli_num_rows($check_nisn) > 0) {
        $_SESSION['error'] = "NISN sudah digunakan!";
        header("Location: ../../view/admin/kelolaSiswa/tambahSiswa_view.php");
        exit;
    }

    //INSERT INTO users
    $sql_users = "INSERT INTO users(email,password,role) VALUES ('$email','$password','siswa');";
    $result_users = mysqli_query($conn, $sql_users);
    //INSERT INTO guru
    if ($result_users) {
        //Ambil id users terakhir
        $user_id = mysqli_insert_id($conn);
        //Masukkan ke guru
        $sql_siswa = "INSERT INTO siswa(user_id,nama,nisn,kelas) VALUES ('$user_id','$name','$nisn','$kelas');";
        $result_siswa = mysqli_query($conn, $sql_siswa);

        if ($result_siswa) {

            $_SESSION['success'] = "Data siswa berhasil ditambahkan!";
            header("Location: ../../view/admin/kelolaSiswa/tambahSiswa_view.php");
            exit;
        } else {

            $_SESSION['error'] = "Data siswa gagal ditambahkan!";
            header("Location: ../../view/admin/kelolaSiswa/tambahSiswa_view.php");
            exit;
        }
    } else {

        $_SESSION['error'] = "Data siswa gagal ditambahkan!";
        header("Location: ../../view/admin/kelolaSiswa/tambahSiswa_view.php");
        exit;
    }
}
?>