<?php
session_start();
require __DIR__ . '/../../controller/admin/kelolaSiswa/lihat_nilai_siswa_controller.php';

include '../../layout/header.php';
include '../../layout/sidebar_siswa.php';
?>

<div class="main-content">
    <div class="container-fluid py-4">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Nilai Saya</h5>
            </div>

            <div class="card-body">

                <?php if ($get_nilai === null): ?>
                    <div class="alert alert-warning">
                        Data siswa tidak ditemukan. Silakan hubungi admin.
                    </div>
                <?php else: ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Mata Pelajaran</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; $ada_data = false; ?>
                            <?php while ($row = mysqli_fetch_assoc($get_nilai)): ?>
                                <?php $ada_data = true; ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($row['nama_mapel']) ?></td>
                                    <td><?= htmlspecialchars($row['nilai']) ?></td>
                                </tr>
                            <?php endwhile; ?>
                            <?php if (!$ada_data): ?>
                                <tr>
                                    <td colspan="3" class="text-center text-muted">
                                        Belum ada nilai yang diinput
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php endif; ?>

            </div>
        </div>

    </div>
</div>

<?php include '../../layout/footer.php'; ?>
