<?php
session_start();
require(__DIR__ . "/../../../config/db.php");

if (isset($_POST["submit"])) {

    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $nip = $_POST["nip"];
    $mapels = $_POST["mapel"]; // array
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // CEK EMAIL
    $check_email = mysqli_query($conn, "
        SELECT * FROM users 
        WHERE email = '$email'
    ");

    if (mysqli_num_rows($check_email) > 0) {
        $_SESSION['error'] = "Email sudah digunakan!";
        header("Location: ../../../view/admin/kelolaGuru/tambahGuru_view.php");
        exit;
    }

    // CEK NIP
    $check_nip = mysqli_query($conn, "
        SELECT * FROM guru 
        WHERE nip = '$nip'
    ");

    if (mysqli_num_rows($check_nip) > 0) {
        $_SESSION['error'] = "NIP sudah digunakan!";
        header("Location: ../../../view/admin/kelolaGuru/tambahGuru_view.php");
        exit;
    }

    // SIMPAN USER
    $sql_user = "
        INSERT INTO users(email, password, role)
        VALUES ('$email', '$password', 'guru')
    ";

    $result_user = mysqli_query($conn, $sql_user);

    if (!$result_user) {
        $_SESSION['error'] = "Gagal menambahkan user!";
        header("Location: ../../../view/admin/kelolaGuru/tambahGuru_view.php");
        exit;
    }

    // AMBIL ID USER
    $user_id = mysqli_insert_id($conn);

    // SIMPAN GURU
    $sql_guru = "
        INSERT INTO guru(user_id, nama, nip)
        VALUES ('$user_id', '$nama', '$nip')
    ";

    $result_guru = mysqli_query($conn, $sql_guru);

    if (!$result_guru) {
        $_SESSION['error'] = "Gagal menambahkan guru!";
        header("Location: ../../../view/admin/kelolaGuru/tambahGuru_view.php");
        exit;
    }

    // AMBIL ID GURU
    $guru_id = mysqli_insert_id($conn);

    // SIMPAN SEMUA MAPEL YANG DIPILIH
    foreach ($mapels as $mapel_id) {

        mysqli_query($conn, "
            INSERT INTO guru_mapel(guru_id, mapel_id)
            VALUES ('$guru_id', '$mapel_id')
        ");
    }

    $_SESSION['success'] = "Data guru berhasil ditambahkan!";
    header("Location: ../../../view/admin/kelolaGuru/tambahGuru_view.php");
    exit;
}
