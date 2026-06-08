<?php
session_start();
require __DIR__ . '/../../controller/get_nilai_controller.php';

include '../../layout/header.php';
include '../../layout/sidebar_guru.php';
?>

<div class="main-content">
    <div class="container-fluid py-4">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Data Nilai Siswa</h5>
            </div>

            <div class="card-body">

                <!-- FILTER MAPEL -->
                <form method="GET" class="mb-3">

                    <div class="row">

                        <div class="col-md-4">
                            <input
                                type="text"
                                name="nama"
                                class="form-control"
                                placeholder="Cari nama siswa..."
                                value="<?= $_GET['nama'] ?? '' ?>">
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">
                                Cari
                            </button>
                        </div>

                        <div class="col-md-2">
                            <a href="data_nilai_view.php" class="btn btn-secondary">
                                Reset
                            </a>
                        </div>

                    </div>

                </form>

                <!-- TABEL NILAI -->
                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Mata Pelajaran</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php $no = 1; ?>

                            <?php while ($row = mysqli_fetch_assoc($get_nilai)): ?>

                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['nisn'] ?></td>
                                    <td><?= $row['nama_siswa'] ?></td>
                                    <td><?= $row['nama_mapel'] ?></td>
                                    <td><?= $row['nilai'] ?></td>
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