<?php
session_start();
require __DIR__ . '/../../controller/admin/kelolaSiswa/get_siswa_kelola_controller.php';

include '../../layout/header.php';
include '../../layout/sidebar_guru.php';
?>

<div class="main-content">
    <div class="container py-4">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Pilih Siswa untuk Input Nilai</h5>
            </div>

            <div class="card-body">

                <form method="GET" class="mb-3">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text"
                                name="search"
                                class="form-control"
                                placeholder="Cari nama atau NISN siswa..."
                                value="<?= $_GET['search'] ?? '' ?>">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                        <div class="col-md-2">
                            <a href="pilih_siswa_view.php" class="btn btn-secondary">Reset</a>
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
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php while ($siswa = mysqli_fetch_assoc($get_siswa)): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $siswa['nisn'] ?></td>
                                    <td><?= $siswa['nama'] ?></td>
                                    <td><?= $siswa['kelas'] ?></td>
                                    <td>
                                        <a href="input_nilai_view.php?id=<?= $siswa['id'] ?>"
                                            class="btn btn-primary btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                            Input Nilai
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>

<?php include '../../layout/footer.php'; ?>
