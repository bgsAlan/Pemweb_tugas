<?php
include("../../layout/header.php");
include("../../layout/sidebar_guru.php");
?>

<div class="main-content">

    <div class="container-fluid px-4 pt-4 pb-5">

        <div class="mb-4">
            <h3 class="fw-normal">Selamat Datang, <span class="fw-bold">Bapak/Ibu Guru</span> 👋</h3>
            <p class="text-muted">Semangat mencerdaskan anak bangsa hari ini!</p>
        </div>

        <div class="row g-4 mb-5">

            <div class="col-12 col-md-4">
                <div class="card border-0 shadow-sm h-100 py-4 text-center rounded-3">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="mb-3">
                            <i class="bi bi-calendar2-check-fill text-success" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-4">Presensi</h5>
                        <a href="presensi_guru_view.php" class="btn btn-success px-4 rounded-2">Buka Menu</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card border-0 shadow-sm h-100 py-4 text-center rounded-3">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="mb-3">
                            <i class="bi bi-file-earmark-plus-fill text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-4">Tambah Nilai Siswa</h5>
                        <a href="input_nilai_view.php" class="btn btn-primary px-4 rounded-2">Buka Menu</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card border-0 shadow-sm h-100 py-4 text-center rounded-3">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="mb-3">
                            <i class="bi bi-bar-chart-fill text-warning" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-4">Lihat Nilai Siswa</h5>
                        <a href="data_nilai_view.php" class="btn btn-warning text-dark px-4 rounded-2">Buka Menu</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?php
include("../../layout/footer.php");
?>