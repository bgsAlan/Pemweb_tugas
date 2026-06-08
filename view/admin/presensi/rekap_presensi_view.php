<?php

session_start();

require_once('../../../controller/admin/presensi/rekap_controller.php');

include '../../../layout/header.php';
include '../../../layout/sidebar_admin.php';
?>

<div class="main-content">
    <div class="container-fluid">
        
        <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
            <div>
                <h2 class="fw-bold">Rekap Presensi</h2>
                <p class="text-muted mb-0">Laporan akumulasi kehadiran berdasarkan database akademik.</p>
            </div>
            <button onclick="window.print();" class="btn btn-success rounded-3 px-4 d-print-none">
                <i class="bi bi-printer"></i> Cetak Rekap
            </button>
        </div>

        <div class="card border-0 shadow-sm rounded-3 mb-4 d-print-none">
            <div class="card-body p-3">
                <form method="GET" class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label class="col-form-label fw-semibold">Pilih Kategori:</label>
                    </div>
                    <div class="col-auto">
                        <select name="target" class="form-select rounded-3" onchange="this.form.submit()">
                            <option value="siswa" <?= $filter_target == 'siswa' ? 'selected' : ''; ?>>Siswa</option>
                            <option value="guru" <?= $filter_target == 'guru' ? 'selected' : ''; ?>>Guru</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3">Data Rekap Kehadiran (Kategori: <?= ucfirst($filter_target); ?>)</h5>
                
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Lengkap</th>
                                <th class="text-center text-success">Hadir</th>
                                <th class="text-center text-primary">Izin</th>
                                <th class="text-center text-warning">Sakit</th>
                                <th class="text-center text-danger">Alpa</th>
                                <th class="text-center fw-bold">Total Absen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            if (mysqli_num_rows($result_rekap) > 0) : 
                                while ($row = mysqli_fetch_assoc($result_rekap)) : 
                                    // Jika dia tidak pernah absen sama sekali, set total_presensi jadi 0 alih-alih menghitung baris null
                                    $has_absen = ($row['total_hadir'] + $row['total_izin'] + $row['total_sakit'] + $row['total_alpa']);
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td class="fw-semibold"><?= htmlspecialchars($row['nama_user']); ?></td>
                                    <td class="text-center text-success fw-bold"><?= $row['total_hadir']; ?></td>
                                    <td class="text-center text-primary"><?= $row['total_izin']; ?></td>
                                    <td class="text-center text-warning"><?= $row['total_sakit']; ?></td>
                                    <td class="text-center text-danger fw-bold"><?= $row['total_alpa']; ?></td>
                                    <td class="text-center bg-light fw-bold"><?= $has_absen; ?> Kali</td>
                                </tr>
                            <?php 
                                endwhile; 
                            else : 
                            ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted p-4">Tidak ada data entri di database.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>

<style>
@media print {
    .d-print-none, .sidebar, header, .navbar, nav { display: none !important; }
    .main-content { margin: 0 !important; padding: 0 !important; width: 100% !important; }
    body { background-color: #fff; }
}
</style>

<?php include '../../../layout/footer.php'; ?>