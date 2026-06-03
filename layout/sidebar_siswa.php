<!-- Sidebar Desktop -->
<div class="sidebar d-none d-lg-block p-3">
    <h4 class="text-white mb-4">PanelSiswa</h4>

    <a href="dashboard_guru_view.php">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <a href="presensi_view.php">
        <i class="bi bi-calendar-check"></i> Presensi
    </a>


    <a href="lihat_nilai.php">
        <i class="bi bi-clipboard-data"></i> Lihat Nilai Siswa
    </a>

    <a href="../../controller/controll_logout.php">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>
</div>

<!-- Sidebar Mobile -->
<div class="offcanvas offcanvas-start text-bg-dark"
    tabindex="-1"
    id="sidebarMenu">

    <div class="offcanvas-header">
        <h5 class="offcanvas-title">PanelSiswa</h5>

        <button type="button"
            class="btn-close btn-close-white"
            data-bs-dismiss="offcanvas">
        </button>
    </div>

    <div class="offcanvas-body">

        <a href="dashboard_siswa_view.php" class="d-block text-white mb-3 text-decoration-none">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a href="presensi_view.php" class="d-block text-white mb-3 text-decoration-none">
            <i class="bi bi-calendar-check"></i> Presensi
        </a>

        <a href="lihat_nilai.php" class="d-block text-white mb-3 text-decoration-none">
            <i class="bi bi-clipboard-data"></i> Lihat Nilai Siswa
        </a>

        <a href="../../controller/controll_logout.php" class="d-block text-white text-decoration-none">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>

    </div>
</div>