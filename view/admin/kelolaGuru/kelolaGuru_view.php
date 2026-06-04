<?php
session_start();
require __DIR__ . "/../../../controller/admin/kelolaGuru/get_mapel_controller.php";
require __DIR__ . "/../../../controller/admin/kelolaGuru/get_guru_kelola_controller.php";
include("../../../layout/header.php");
include("../../../layout/sidebar_admin.php");
?>

<div class="main-content">

    <div class="container-fluid">

        <div class="card shadow border-0">

            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Kelola Guru</h4>

                <a href="tambahGuru_view.php" class="btn btn-light">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Guru
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
                                placeholder="Cari nama atau NIP guru..."
                                value="<?= $_GET['search'] ?? '' ?>">
                        </div>

                        <div class="col-md-3">
                            <select name="mapel" class="form-select">
                                <option value="">Pilih Mata Pelajaran</option>
                                <?php while ($row = mysqli_fetch_assoc($get_mapel)) : ?>
                                    <option value="<?= $row['id']; ?>">
                                        <?= $row['nama']; ?>
                                    </option>
                                <?php endwhile; ?>
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
                                <th>NIP</th>
                                <th>Nama Guru</th>
                                <th>Mata pelajaran</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php while ($guru = mysqli_fetch_assoc($get_guru)): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $guru['nip'] ?></td>
                                    <td><?= $guru['nama'] ?></td>
                                    <td><?= $guru['mapel'] ?></td>
                                    <td>
                                        <a href="edit_guru_view.php?id=<?= $guru['id'] ?>"
                                            class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </a>
                                        <a href="../../../controller/admin/kelolaGuru/hapus_guru_controller.php?id=<?= $guru['id'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus guru ini?')">
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