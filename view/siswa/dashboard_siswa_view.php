<?php
include("../../layout/header.php");
include("../../layout/sidebar_siswa.php");
?>

<div class="main-content">

    <div class="container-fluid px-4 pt-4 pb-5">

        <div class="mb-4">
            <h3 class="fw-normal">Halo, <span class="fw-bold">Siswa Berprestasi</span> 🎓</h3>
            <p class="text-muted">Gimana kabarnya hari ini? Jangan lupa presensi dan nilaimu ya!</p>
        </div>

        <div class="row g-4 mb-5">

            <div class="col-12 col-md-4">
                <div class="card border-0 shadow-sm h-100 py-4 text-center rounded-3">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="mb-3">
                            <i class="bi bi-calendar2-check-fill text-success" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-4">Presensi</h5>
                        <a href="presensi_siswa_view.php" class="btn btn-success px-4 rounded-2">Presensi</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card border-0 shadow-sm h-100 py-4 text-center rounded-3">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="mb-3">
                            <i class="bi bi-award-fill text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-4">Nilai Akademik</h5>
                        <a href="lihat_nilai.php" class="btn btn-primary px-4 rounded-2">Cek Nilai Kamu</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php
include("../../layout/footer.php");
?>