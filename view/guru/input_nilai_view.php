<?php
session_start();
// Guard: kalau tidak ada ?id redirect ke halaman pilih siswa
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: pilih_siswa_view.php");
    exit;
}

include '../../layout/header.php';
include '../../layout/sidebar_guru.php';
require __DIR__ . '/../../controller/admin/kelolaGuru/input_nilai_guru_controller.php';
?>

<div class="main-content">

    <div class="container py-4">

        <div class="card shadow mx-auto" style="max-width: 700px;">

            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Input Nilai Siswa 📝</h4>
            </div>

            <div class="card-body">

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?= $_SESSION['error'] ?>
                        <?php unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?= $_SESSION['success'] ?>
                        <?php unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>

                <form action="../../controller/admin/kelolaGuru/insert_nilai_guru_controller.php" method="POST">

                    <input type="hidden" name="siswa_id" value="<?= htmlspecialchars($siswa['id']) ?>">

                    <div class="mb-3">
                        <label class="form-label">Nama Siswa</label>
                        <input type="text"
                            class="form-control"
                            value="<?= htmlspecialchars($siswa['nama']) ?>"
                            readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">NISN</label>
                        <input type="text"
                            class="form-control"
                            value="<?= htmlspecialchars($siswa['nisn']) ?>"
                            readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mata Pelajaran</label>
                        <select name="mapel_id" class="form-select" required>
                            <option value="">-- Pilih Mata Pelajaran --</option>
                            <?php while ($mapel = mysqli_fetch_assoc($get_mapel)): ?>
                                <option value="<?= htmlspecialchars($mapel['id']) ?>">
                                    <?= htmlspecialchars($mapel['nama']) ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis Nilai</label>
                        <select name="jenis_nilai" class="form-select" required>
                            <option value="">-- Pilih Jenis Nilai --</option>
                            <option value="tugas">Tugas</option>
                            <option value="harian">Harian</option>
                            <option value="uts">UTS</option>
                            <option value="uas">UAS</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nilai</label>
                        <input type="number"
                            name="nilai"
                            min="0"
                            max="100"
                            class="form-control"
                            placeholder="Contoh: 85"
                            required>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Simpan Nilai</button>
                        <a href="pilih_siswa_view.php" class="btn btn-secondary">Kembali</a>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

<?php include '../../layout/footer.php'; ?>