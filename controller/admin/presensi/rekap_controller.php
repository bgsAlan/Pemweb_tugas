<?php

require_once("../../../config/db.php");

$filter_target = isset($_GET['target']) ? $_GET['target'] : 'siswa';

if ($filter_target == 'siswa') {
    $sql_rekap = "
        SELECT 
            s.user_id,
            s.nama AS nama_user,
            'siswa' AS target_role,
            SUM(CASE WHEN pd.status_kehadiran = 'hadir' THEN 1 ELSE 0 END) AS total_hadir,
            SUM(CASE WHEN pd.status_kehadiran = 'izin' THEN 1 ELSE 0 END) AS total_izin,
            SUM(CASE WHEN pd.status_kehadiran = 'sakit' THEN 1 ELSE 0 END) AS total_sakit,
            SUM(CASE WHEN pd.status_kehadiran = 'alpha' THEN 1 ELSE 0 END) AS total_alpa,
            COUNT(pd.id) AS total_presensi
        FROM siswa s
        LEFT JOIN presensi_detail pd ON s.user_id = pd.user_id
        GROUP BY s.user_id, s.nama
        ORDER BY s.nama ASC
    ";
} else {
    $sql_rekap = "
        SELECT 
            g.user_id,
            g.nama AS nama_user,
            'guru' AS target_role,
            SUM(CASE WHEN pd.status_kehadiran = 'hadir' THEN 1 ELSE 0 END) AS total_hadir,
            SUM(CASE WHEN pd.status_kehadiran = 'izin' THEN 1 ELSE 0 END) AS total_izin,
            SUM(CASE WHEN pd.status_kehadiran = 'sakit' THEN 1 ELSE 0 END) AS total_sakit,
            SUM(CASE WHEN pd.status_kehadiran = 'alpha' THEN 1 ELSE 0 END) AS total_alpa,
            COUNT(pd.id) AS total_presensi
        FROM guru g
        LEFT JOIN presensi_detail pd ON g.user_id = pd.user_id
        GROUP BY g.user_id, g.nama
        ORDER BY g.nama ASC
    ";
}

$result_rekap = mysqli_query($conn, $sql_rekap);

if (!$result_rekap) {
    die("Query Error: " . mysqli_error($conn));
}