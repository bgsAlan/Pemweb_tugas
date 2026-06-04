<!-- Ambil semua data siswa yang ada -->
<?php
require(__DIR__ . '/../../../config/db.php');

//Ambil semua data siswa yang ada


$query = "
SELECT 
    guru.id,
    guru.nip,
    guru.nama,
    GROUP_CONCAT(mata_pelajaran.nama SEPARATOR ', ') AS mapel
FROM guru
LEFT JOIN guru_mapel 
    ON guru.id = guru_mapel.guru_id
LEFT JOIN mata_pelajaran
    ON guru_mapel.mapel_id = mata_pelajaran.id
GROUP BY guru.id
";

$get_guru = mysqli_query($conn, $query);
?>