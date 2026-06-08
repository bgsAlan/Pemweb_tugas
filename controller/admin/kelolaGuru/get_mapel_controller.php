<!-- Ambil semua data siswa yang ada -->
<?php
require(__DIR__ . '/../../../config/db.php');

//Ambil semua data mapel yang ada
$get_mapel = mysqli_query($conn, "SELECT * FROM mata_pelajaran ORDER BY id;");
?>