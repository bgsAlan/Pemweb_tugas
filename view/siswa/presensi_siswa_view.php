<?php

require(__DIR__ . '../../../controller/admin/presensi/get_presensi_siswa_controller.php');

include '../../layout/header.php';
include '../../layout/sidebar_siswa.php';

?>

<div class="main-content">
    <div class="container-fluid">

        <div class="mb-4">
            <h2 class="fw-bold">Presensi Siswa</h2>
            <p class="text-muted">Daftar presensi aktif</p>
        </div>

        <div class="row g-4">

            <?php if (mysqli_num_rows($result) > 0) : ?>

                <?php while ($presensi = mysqli_fetch_assoc($result)) : ?>

                    <?php

                    $cek = mysqli_query(
                        $conn,
                        "SELECT status_kehadiran
                         FROM presensi_detail
                         WHERE presensi_id = '{$presensi['id']}'
                         AND user_id = '$user_id'"
                    );

                    $detail = mysqli_fetch_assoc($cek);
                    $status = $detail['status_kehadiran'] ?? null;

                    if ($status === 'hadir') {

                        $card_style = 'border: 2px solid #198754; background: rgba(25,135,84,0.08);';
                        $badge = '<span class="badge bg-success">Hadir</span>';
                    } elseif ($status === 'sakit' || $status === 'izin') {

                        $card_style = 'border: 2px solid #ffc107; background: rgba(255,193,7,0.10);';
                        $badge = '<span class="badge bg-warning text-dark">' . ucfirst($status) . '</span>';
                    } elseif ($status === 'alpha') {

                        $card_style = 'border: 2px solid #dc3545; background: rgba(220,53,69,0.08);';
                        $badge = '<span class="badge bg-danger">Alpha</span>';
                    } else {

                        $card_style = '';
                        $badge = '<span class="badge bg-secondary">Belum Presensi</span>';
                    }

                    ?>

                    <div class="col-lg-4">

                        <div class="card border-0 shadow-sm rounded-4" style="<?= $card_style ?>">

                            <div class="card-body p-4">

                                <div class="d-flex justify-content-between align-items-start mb-3">

                                    <h4 class="fw-bold mb-0">
                                        <?= htmlspecialchars($presensi['judul']) ?>
                                    </h4>

                                    <?= $badge ?>

                                </div>

                                <p class="text-muted mb-2">
                                    Tanggal: <?= $presensi['tanggal'] ?>
                                </p>

                                <p class="text-muted mb-4">
                                    Jam: <?= $presensi['jam_dibuka'] ?>
                                </p>

                                <?php if (!$status) : ?>

                                    <a href="form_presensi_siswa_view.php?presensi_id=<?= $presensi['id'] ?>"
                                        class="btn btn-primary rounded-3">
                                    Presensi
                                    </a>

                                <?php else : ?>

                                    <button class="btn btn-secondary rounded-3" disabled>
                                        Sudah Presensi
                                    </button>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                <?php endwhile; ?>

            <?php else : ?>

                <div class="col-12">

                    <div class="alert alert-secondary">
                        Tidak ada presensi aktif
                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>
</div>

<?php include '../../layout/footer.php'; ?>