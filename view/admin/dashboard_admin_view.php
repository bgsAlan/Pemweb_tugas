<?php
session_start();
include("../../layout/header.php");
include("../../layout/sidebar_admin.php");
require __DIR__ . "/../../controller/admin/dashboard_admin_controller.php";
?>
<div class="main-content">
    <div class="container-fluid">
        <h2 class="mb-4">Dashboard Admin</h2>

        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card text-center shadow border-0">
                    <div class="card-body">
                        <i class="bi bi-mortarboard-fill fs-1 text-primary"></i>
                        <h3 class="mt-2"><?= $total_siswa['total_siswa'] ?? 0 ?></h3>
                        <p class="mb-0">Total Siswa</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow border-0">
                    <div class="card-body">
                        <i class="bi bi-person-workspace fs-1 text-success"></i>
                        <h3 class="mt-2"><?= $total_guru['total_guru'] ?? 0 ?></h3>
                        <p class="mb-0">Total Guru</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow border-0">
                    <div class="card-body">
                        <i class="bi bi-calendar-check fs-1 text-warning"></i>
                        <h3 class="mt-2"><?= $presensi_aktif['total'] ?? 0 ?></h3>
                        <p class="mb-0">Presensi Dibuka</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow border-0">
                    <div class="card-body">
                        <i class="bi bi-check-circle-fill fs-1 text-info"></i>
                        <h3 class="mt-2"><?= $hadir_hari_ini['total'] ?? 0 ?></h3>
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
                        <a href="kelolaUsers_view.php" class="btn btn-primary mt-2">Buka Menu</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow border-0">
                    <div class="card-body text-center py-4">
                        <i class="bi bi-calendar-event display-4 text-success"></i>
                        <h4 class="mt-3">Kelola Presensi</h4>
                        <a href="presensi/open_presensi_view.php" class="btn btn-success mt-2">Buka Menu</a>
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
                            <th>NISN/NIP</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($query_terbaru) && mysqli_num_rows($query_terbaru) > 0) : ?>
                            <?php while ($row = mysqli_fetch_assoc($query_terbaru)) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['nama']) ?></td>
                                    <td><?= htmlspecialchars($row['kelas'] ?? '-') ?></td>
                                    <td>
                                        <?php
                                        // Dinamisin warna badge sesuai status
                                        if ($row['status_kehadiran'] == 'hadir') {
                                            $badge_color = 'bg-success';
                                        } elseif ($row['status_kehadiran'] == 'sakit' || $row['status_kehadiran'] == 'izin') {
                                            $badge_color = 'bg-warning text-dark';
                                        } else {
                                            $badge_color = 'bg-danger';
                                        }
                                        ?>
                                        <span class="badge <?= $badge_color ?>">
                                            <?= ucfirst($row['status_kehadiran']) ?>
                                        </span>
                                    </td>
                                    <td><?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada data presensi terbaru.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?php include("../../layout/footer.php"); ?>