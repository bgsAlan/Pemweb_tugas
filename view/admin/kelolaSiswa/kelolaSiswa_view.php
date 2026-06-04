<?php
session_start();
require __DIR__ . "/../../../controller/admin/kelolaSiswa/get_siswa_kelola_controller.php";
include("../../../layout/header.php");
include("../../../layout/sidebar_admin.php");
?>

<div class="main-content">

    <div class="container-fluid">

        <div class="card shadow border-0">

            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Kelola Siswa</h4>

                <a href="tambahSiswa_view.php" class="btn btn-light">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Siswa
                </a>
            </div>

            <div class="card-body">

                <!-- Search & Filter -->
                <form method="GET">

                    <div class="row mb-4">

                        <div class="col-md-6">
                            <input type="text"
                                name="search"
                                class="form-control"
                                placeholder="Cari nama atau NISN siswa..."
                                value="<?= $_GET['search'] ?? '' ?>">
                        </div>

                        <div class="col-md-3">
                            <select name="kelas" class="form-select">
                                <option value="">Pilih kelas</option>

                                <option value="X-A">X-A</option>
                                <option value="X-B">X-B</option>
                                <option value="X-C">X-C</option>
                                <option value="X-D">X-D</option>
                                <option value="X-E">X-E</option>

                                <option value="XI-A">XI-A</option>
                                <option value="XI-B">XI-B</option>
                                <option value="XI-C">XI-C</option>
                                <option value="XI-D">XI-D</option>
                                <option value="XI-E">XI-E</option>

                                <option value="XII-A">XII-A</option>
                                <option value="XII-B">XII-B</option>
                                <option value="XII-C">XII-C</option>
                                <option value="XII-D">XII-D</option>
                                <option value="XII-E">XII-E</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-search"></i>
                                Filter
                            </button>
                        </div>

                    </div>

                </form>

                <!-- Tabel -->
                <div class="table-responsive">
                    <?php if (isset($_SESSION['success'])) : ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['success']; ?>
                        </div>
                        <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['error']; ?>
                        </div>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>
                    <table class="table table-bordered table-hover align-middle">

                        <thead class="table-dark">
                            <tr>
                                <th width="60">No</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th width="180">Aksi</th>
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
                                        <a href="edit_siswa_view.php"
                                            class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </a>
                                        <a href="../../../controller/admin/kelolaSiswa/hapus_siswa_controller.php?id=<?= $siswa['id'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus siswa ini?')">
                                            <i class="bi bi-trash"></i>
                                            Hapus
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

<?php
include("../../../layout/footer.php");
?>