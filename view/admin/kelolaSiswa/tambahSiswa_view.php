<?php
session_start();

include("../../../layout/header.php");
include("../../../layout/sidebar_admin.php");
?>


<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow">
                    <div class="card-header text-center bg-primary text-white">
                        <h3>Form Tambah Siswa</h3>
                    </div>
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['error']; ?>
                        </div>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['success'])) : ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['success']; ?>
                        </div>
                        <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>
                    <div class="card-body">
                        <form action="../../../controller/admin/tambah_siswa_controller.php" method="POST">

                            <div class="mb-3">
                                <label class="form-label">Nama Siswa</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama siswa" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">NISN</label>
                                <input type="text" name="nisn" class="form-control" placeholder="Masukkan NISN" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kelas</label>
                                <select name="kelas" id="kelas" class="form-select">
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

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary w-100">
                                Tambah Siswa
                            </button>

                        </form>
                        <a href="../dashboard_admin_view.php" class="btn btn-warning w-100 mt-2">
                            Kembali
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
<?php 

include("../../../layout/footer.php");
?>