<?php
include("../../layout/header.php");
include("../../layout/sidebar_guru.php");
?>

<div class="main-content">
    <div class="container-fluid">

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Buka Presensi Baru</h5>
                    </div>

                    <div class="card-body">

                        <form action="../../controller/guru/simpan_presensi_controller.php" method="POST">

                            <div class="mb-3">
                                <label class="form-label">Judul Presensi</label>
                                <input type="text"
                                       name="judul"
                                       class="form-control"
                                       placeholder="Contoh : Presensi Pagi"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Target Presensi</label>
                                <select name="target"
                                        class="form-select"
                                        required>
                                    <option value="">Pilih Target</option>
                                    <option value="murid">Murid</option>
                                    <option value="guru">Guru</option>
                                    <option value="semua">Semua</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date"
                                       name="tanggal"
                                       class="form-control"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jam Dibuka</label>
                                <input type="time"
                                       name="jam_dibuka"
                                       class="form-control"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea name="keterangan"
                                          rows="4"
                                          class="form-control"
                                          placeholder="Masukkan keterangan presensi"></textarea>
                            </div>

                            <button type="submit"
                                    class="btn btn-primary">
                                Buka Presensi
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
include("../../layout/footer.php");
?>