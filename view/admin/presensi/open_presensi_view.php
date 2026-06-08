<?php
session_start();

require('../../controller/get_presensi_controller.php');

include '../../layout/header.php';
include '../../layout/sidebar.php';
?>

<div class="main-content">

    <div class="container-fluid">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold">
                    Buka Presensi
                </h2>

                <p class="text-muted mb-0">
                    Admin dapat membuka sesi presensi untuk guru dan murid
                </p>
            </div>

            <a href="../../controller/presensi_end_controller.php"
                class="btn btn-danger rounded-3 px-4">

                <i class="bi bi-x-circle"></i>
                Tutup Presensi

            </a>

        </div>

        <div class="row g-4">

            <!-- ALERT -->
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

            <!-- FORM -->
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-4">
                            Form Buka Presensi
                        </h4>


                        <form action="../../controller/presensi_controller.php"
                            method="POST">

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Judul Presensi
                                </label>

                                <input
                                    type="text"
                                    class="form-control rounded-3"
                                    placeholder="Contoh: Presensi Pagi"
                                    name="title"
                                    required>

                            </div>

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label fw-semibold">
                                        Tanggal
                                    </label>

                                    <input
                                        type="date"
                                        class="form-control rounded-3"
                                        name="date"
                                        required>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label fw-semibold">
                                        Jam Dibuka
                                    </label>

                                    <input
                                        type="time"
                                        class="form-control rounded-3"
                                        name="time"
                                        required>

                                </div>

                            </div>

                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Ditujukan Untuk
                                </label>

                                <div class="d-flex gap-4 mt-2 flex-wrap">

                                    <div class="form-check">

                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="target"
                                            value="murid">

                                        <label class="form-check-label">
                                            Murid
                                        </label>

                                    </div>

                                    <div class="form-check">

                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="target"
                                            value="guru">

                                        <label class="form-check-label">
                                            Guru
                                        </label>

                                    </div>

                                    <div class="form-check">

                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="target"
                                            value="semua"
                                            checked>

                                        <label class="form-check-label">
                                            Semua
                                        </label>

                                    </div>

                                </div>

                            </div>

                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Keterangan
                                </label>

                                <textarea
                                    class="form-control rounded-3"
                                    rows="4"
                                    name="description"
                                    placeholder="Masukkan keterangan presensi..."></textarea>

                            </div>

                            <div class="d-flex justify-content-end gap-2">

                                <button
                                    type="reset"
                                    class="btn btn-outline-secondary rounded-3">

                                    Reset

                                </button>

                                <button
                                    type="submit"
                                    name="submit"
                                    class="btn btn-primary rounded-3 px-4">

                                    <i class="bi bi-check-circle"></i>
                                    Buka Presensi

                                </button>

                            </div>

                        </form>


                    </div>

                </div>

            </div>

            <!-- STATUS -->
            <div class="col-lg-4">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-4">
                            Status Presensi
                        </h5>

                        <?php if (mysqli_num_rows($query) > 0) : ?>

                            <?php while ($presensi = mysqli_fetch_assoc($query)) : ?>

                                <?php

                                $count = mysqli_query(
                                    $conn,

                                    "SELECT COUNT(*) as total

                        FROM presensi_detail

                        WHERE presensi_id='" . $presensi['id'] . "'"
                                );

                                $result = mysqli_fetch_assoc($count);

                                $total_pengisi = $result['total'];

                                ?>

                                <div class="bg-light rounded-4 p-3 mb-3">

                                    <!-- STATUS -->
                                    <div class="d-flex justify-content-between mb-2">

                                        <span class="fw-bold">
                                            <?= $presensi['judul']; ?>
                                        </span>

                                        <span class="badge bg-success">
                                            <?= ucfirst($presensi['status']); ?>
                                        </span>

                                    </div>

                                    <!-- TARGET -->
                                    <div class="d-flex justify-content-between mb-2">

                                        <span>Target</span>

                                        <span>

                                            <?php

                                            if ($presensi['target'] == 'semua') {
                                                echo "Guru & Murid";
                                            } else {
                                                echo ucfirst($presensi['target']);
                                            }

                                            ?>

                                        </span>

                                    </div>

                                    <!-- TOTAL -->
                                    <div class="d-flex justify-content-between mb-2">

                                        <span>Total Mengisi</span>

                                        <span>
                                            <?= $total_pengisi; ?> Orang
                                        </span>

                                    </div>

                                    <!-- TANGGAL -->
                                    <div class="d-flex justify-content-between">

                                        <span>Tanggal</span>

                                        <span>
                                            <?= $presensi['tanggal']; ?>
                                        </span>

                                    </div>

                                </div>

                            <?php endwhile; ?>

                        <?php else : ?>

                            <div class="alert alert-secondary mb-0">

                                Tidak ada presensi aktif

                            </div>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

            <!-- DIBUKA OLEH -->
            <div class="bg-light rounded-4 p-3">

                <div class="d-flex justify-content-between">

                    <span>Dibuka Oleh</span>

                    <span class="fw-semibold">
                        Admin
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

</div>

</div>

<?php include '../../layout/footer.php'; ?>