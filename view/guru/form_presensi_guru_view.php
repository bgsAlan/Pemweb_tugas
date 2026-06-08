<?php

require('../../controller/admin/presensi/get_presensi_guru_controller.php');

$presensi_id = $_GET['presensi_id'] ?? null;

if (!$presensi_id) {
    header("Location: presensi_guru_view.php");
    exit;
}

include '../../layout/header.php';
include '../../layout/sidebar_guru.php';

?>

<div class="main-content">

    <div class="container-fluid">

        <div class="mb-4">

            <h2 class="fw-bold">
                Presensi Guru
            </h2>

            <p class="text-muted">
                Silahkan isi presensi kehadiran hari ini
            </p>

        </div>

        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-5">

                        <div
                            class="d-flex align-items-center justify-content-center mb-4"
                            style="
                                width:80px;
                                height:80px;
                                border-radius:20px;
                                background: rgba(59,130,246,0.15);
                                font-size:38px;
                                margin:auto;
                            ">
                            📅
                        </div>

                        <h3 class="fw-bold text-center mb-2">
                            Form Presensi
                        </h3>

                        <p class="text-muted text-center mb-5">
                            Pilih status kehadiran anda
                        </p>

                        <form action="../../controller/admin/presensi/save_form_presensi_controller.php" method="POST">

                            <input
                                type="hidden"
                                name="presensi_id"
                                value="<?= $presensi_id ?>">

                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Status Kehadiran
                                </label>

                                <select
                                    name="status_kehadiran"
                                    class="form-select rounded-3 p-3">

                                    <option value="hadir">Hadir</option>
                                    <option value="sakit">Sakit</option>
                                    <option value="izin">Izin</option>
                                    <option value="alpha">Alpha</option>

                                </select>

                            </div>

                            <div class="d-grid">

                                <button
                                    type="submit"
                                    name="submit"
                                    class="btn btn-primary rounded-3 py-3 fw-semibold">

                                    Presensi

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include '../../layout/footer.php'; ?>