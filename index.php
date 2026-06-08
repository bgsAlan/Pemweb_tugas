<?php
// index.php

// Ambil page dari URL, default ke login kalau belum ada
$page = isset($_GET['page']) ? $_GET['page'] : 'login';
$role = isset($_GET['role']) ? $_GET['role'] : 'auth';

// Path dasar ke folder view lo
$basePath = 'view/';

// Logic routing simpel
switch ($role) {
    case 'admin':
        $file = $basePath . 'admin/' . $page . '.php';
        break;
    case 'guru':
        $file = $basePath . 'guru/' . $page . '.php';
        break;
    case 'siswa':
        $file = $basePath . 'siswa/' . $page . '.php';
        break;
    default:
        $file = $basePath . 'auth/login_view.php';
        break;
}

// Cek filenya ada apa nggak, kalau nggak ada lempar ke 404
if (file_exists($file)) {
    include_once $file;
} else {
    echo "<h1>404 - Waduh, halaman nggak ketemu nih!</h1>";
}
