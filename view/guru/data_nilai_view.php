<?php
session_start();
require __DIR__ . '/../../controller/guru/get_nilai_controller.php'; 

include '../../layout/header.php';
include '../../layout/sidebar_guru.php';
?>

<div class="main-content">
    <div class="container-fluid py-4">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Data Nilai Siswa 📊</h5>
            </div>

            <div class="card-body">

                <form method="GET" class="mb-3">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <input
                                type="text"
                                name="nama"
                                class="form-control"
                                placeholder="Cari nama siswa..."
                                value="<?= isset($_GET['nama']) ? htmlspecialchars($_GET['nama']) : '' ?>">
                        </div>

                        <div class="col-md-3">
                            <select name="jenis_nilai" class="form-select">
                                <option value="">-- Semua Jenis Nilai --</option>
                                <option value="tugas" <?= (isset($_GET['jenis_nilai']) && $_GET['jenis_nilai'] == 'tugas') ? 'selected' : '' ?>>Tugas</option>
                                <option value="harian" <?= (isset($_GET['jenis_nilai']) && $_GET['jenis_nilai'] == 'harian') ? 'selected' : '' ?>>Harian</option>
                                <option value="uts" <?= (isset($_GET['jenis_nilai']) && $_GET['jenis_nilai'] == 'uts') ? 'selected' : '' ?>>UTS</option>
                                <option value="uas" <?= (isset($_GET['jenis_nilai']) && $_GET['jenis_nilai'] == 'uas') ? 'selected' : '' ?>>UAS</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">
                                Cari 
                            </button>
                        </div>

                        <div class="col-md-2">
                            <a href="data_nilai_view.php" class="btn btn-secondary w-100">
                                Reset 
                            </a>
                        </div>

                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Mata Pelajaran</th>
                                <th>Jenis Nilai</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (mysqli_num_rows($get_nilai) > 0): ?>
                                <?php $no = 1; ?>
                                <?php while ($row = mysqli_fetch_assoc($get_nilai)): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= htmlspecialchars($row['nisn']) ?></td>
                                        <td><?= htmlspecialchars($row['nama_siswa']) ?></td>
                                        <td><?= htmlspecialchars($row['nama_mapel']) ?></td>
                                        <td>
                                            <span class="badge bg-info text-dark">
                                                <?= strtoupper(htmlspecialchars($row['jenis_nilai'])) ?>
                                            </span>
                                        </td>
                                        <td class="fw-bold"><?= htmlspecialchars($row['nilai']) ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-3">
                                        Data nilai belum ada atau siswa tidak ditemukan 
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>

<?php include '../../layout/footer.php'; ?>