<?php
session_start();
include("../../layout/header.php");
include("../../layout/sidebar_admin.php");
require __DIR__ . "/../../controller/admin/dashboard_controller.php";
?>
<div class="main-content">

    <div class="container-fluid">

        <h2 class="mb-4">Dashboard Admin</h2>

        <div class="row g-4 mb-4">

            <div class="col-md-3">
                <div class="card text-center shadow border-0">
                    <div class="card-body">
                        <i class="bi bi-mortarboard-fill fs-1 text-primary"></i>
                        <h3 class="mt-2"><?= $total_siswa['total_siswa'] ?></h3>
                        <p class="mb-0">Total Siswa</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow border-0">
                    <div class="card-body">
                        <i class="bi bi-person-workspace fs-1 text-success"></i>
                        <h3 class="mt-2"><?= $total_guru['total_guru'] ?></h3>
                        <p class="mb-0">Total Guru</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow border-0">
                    <div class="card-body">
                        <i class="bi bi-calendar-check fs-1 text-warning"></i>
                        <h3 class="mt-2">45</h3>
                        <p class="mb-0">Presensi Dibuka</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow border-0">
                    <div class="card-body">
                        <i class="bi bi-check-circle-fill fs-1 text-info"></i>
                        <h3 class="mt-2">98</h3>
                        <p class="mb-0">Hadir Hari Ini</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row g-4 mb-4">

            <div class="col-md-6">
                <div class="card shadow border-0">
                    <div class="card-body text-center py-4">
                        <i class="bi bi-people-fill display-4 text-primary"></i>
                        <h4 class="mt-3">Kelola Users</h4>
                        <a href="kelolaUsers_view.php"
                            class="btn btn-primary mt-2">
                            Buka Menu
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow border-0">
                    <div class="card-body text-center py-4">
                        <i class="bi bi-calendar-event display-4 text-success"></i>
                        <h4 class="mt-3">Kelola Presensi</h4>
                        <a href="open_presensi_view.php"
                            class="btn btn-success mt-2">
                            Buka Menu
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="card shadow border-0">
            <div class="card-header bg-primary text-white">
                Presensi Terbaru
            </div>

            <div class="card-body">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Alan</td>
                            <td>X-A</td>
                            <td>
                                <span class="badge bg-success">
                                    Hadir
                                </span>
                            </td>
                            <td>03-06-2026</td>
                        </tr>

                        <tr>
                            <td>Nabhan</td>
                            <td>XI-B</td>
                            <td>
                                <span class="badge bg-success">
                                    Hadir
                                </span>
                            </td>
                            <td>03-06-2026</td>
                        </tr>
                    </tbody>

                </table>

            </div>
        </div>

    </div>

</div>

<?php
include("../../layout/footer.php");
?>