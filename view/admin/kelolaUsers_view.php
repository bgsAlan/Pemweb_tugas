<?php
session_start();

include("../../layout/header.php");
include("../../layout/sidebar_admin.php");
?>

<div class="main-content">

    <div class="container-fluid">

        <div class="card shadow border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Kelola Users</h4>
            </div>

            <div class="card-body">
                <div class="row g-4">

                    <!-- Kelola Siswa -->
                    <div class="col-md-6">
                        <div class="card text-center shadow-sm h-100">
                            <div class="card-body py-5">
                                <i class="bi bi-mortarboard-fill display-1 text-primary"></i>

                                <h4 class="mt-3">
                                    Kelola Siswa
                                </h4>

                                <p class="text-muted">
                                    Tambah, edit, hapus, dan lihat data siswa.
                                </p>

                                <a href="kelolaSiswa/kelolaSiswa_view.php"
                                    class="btn btn-primary">
                                    Kelola Siswa
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Kelola Guru -->
                    <div class="col-md-6">
                        <div class="card text-center shadow-sm h-100">
                            <div class="card-body py-5">
                                <i class="bi bi-person-workspace display-1 text-success"></i>

                                <h4 class="mt-3">
                                    Kelola Guru
                                </h4>

                                <p class="text-muted">
                                    Tambah, edit, hapus, dan lihat data guru.
                                </p>

                                <a href="kelola_guru_view.php"
                                    class="btn btn-success">
                                    Kelola Guru
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

<?php include("../../layout/footer.php"); ?>