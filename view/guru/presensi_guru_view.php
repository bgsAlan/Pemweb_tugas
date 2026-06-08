<?php

require('../../controller/admin/presensi/get_presensi_guru_controller.php');

include '../../layout/header.php';
include '../../layout/sidebar_guru.php';

?>

<div class="main-content">
    <div class="container-fluid">

        <div class="row mb-4">
            <div class="col-md-12">
                <h3 class="fw-bold">Presensi Guru</h3>
                <p class="text-muted">Daftar presensi yang sedang aktif</p>
            </div>
        </div>

        <div class="row">

            <?php if(mysqli_num_rows($result) > 0) : ?>

                <?php while($presensi = mysqli_fetch_assoc($result)) : ?>

                    <div class="col-md-4 mb-4">

                        <div class="card shadow border-0 h-100">

                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">
                                    <?= $presensi['judul']; ?>
                                </h5>
                            </div>

                            <div class="card-body">

                                <p>
                                    <strong>Target :</strong>
                                    <?= ucfirst($presensi['target']); ?>
                                </p>

                                <p>
                                    <strong>Tanggal :</strong>
                                    <?= $presensi['tanggal']; ?>
                                </p>

                                <p>
                                    <strong>Jam Dibuka :</strong>
                                    <?= $presensi['jam_dibuka']; ?>
                                </p>

                                <p>
                                    <strong>Keterangan :</strong><br>
                                    <?= $presensi['keterangan']; ?>
                                </p>

                            </div>

                            <div class="card-footer bg-white">

                                <a href="form_presensi_guru_view.php?presensi_id=<?= $presensi['id']; ?>"
                                   class="btn btn-primary">
                                    Isi Presensi
                                </a>

                            </div>

                        </div>

                    </div>

                <?php endwhile; ?>

            <?php else : ?>

                <div class="col-md-12">

                    <div class="alert alert-secondary">
                        Tidak ada presensi aktif.
                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>
</div>

<?php
include '../../layout/footer.php';
?>