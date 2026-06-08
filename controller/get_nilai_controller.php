<?php
require __DIR__ . '/../config/db.php';

$nama = $_GET['nama'] ?? '';

$get_nilai = mysqli_query($conn, "
    SELECT n.nilai, s.nisn, s.nama AS nama_siswa, mp.nama AS nama_mapel
    FROM nilai n
    JOIN siswa s ON n.siswa_id = s.id
    JOIN mata_pelajaran mp ON n.mapel_id = mp.id
    WHERE s.nama LIKE '%$nama%'
    ORDER BY s.nama ASC
");
