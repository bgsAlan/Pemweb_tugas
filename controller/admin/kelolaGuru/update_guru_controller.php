<?php
session_start();
require __DIR__ . "/../../../config/db.php";

if (isset($_POST['submit'])) {

    $guru_id = $_POST['guru_id'];
    $mapels = $_POST['mapel'];

    if (empty($mapels)) {
        $_SESSION['error'] = "Mapel wajib dipilih!";
        header("Location: ../../../view/admin/kelolaGuru/edit_guru_view.php?id=$guru_id");
        exit;
    }

    // Hapus mapel lama
    mysqli_query($conn, "
        DELETE FROM guru_mapel
        WHERE guru_id = '$guru_id'
    ");

    // Simpan mapel baru
    foreach ($mapels as $mapel_id) {

        mysqli_query($conn, "
            INSERT INTO guru_mapel(guru_id, mapel_id)
            VALUES ('$guru_id', '$mapel_id')
        ");
    }

    $_SESSION['success'] = "Data mapel guru berhasil diupdate!";
    header("Location: ../../../view/admin/kelolaGuru/kelolaGuru_view.php");
    exit;
}
