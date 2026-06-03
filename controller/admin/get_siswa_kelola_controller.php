<!-- Ambil semua data siswa yang ada -->
<?php
require(__DIR__ . '/../../config/db.php');

//Ambil semua data siswa yang ada
$get_siswa = mysqli_query($conn, "SELECT * FROM siswa ORDER BY id;");
?>