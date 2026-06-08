<?php
session_start();

require __DIR__ . "/../../../controller/admin/kelolaGuru/edit_guru_controller.php";

include("../../../layout/header.php");
include("../../../layout/sidebar_admin.php");

?>

<div class="main-content">
    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white text-center">
                <h3>Form Edit Guru</h3>
            </div>

            <div class="card-body">

                <form action="../../../controller/admin/kelolaGuru/update_guru_controller.php" method="POST">

                    <input type="hidden"
                        name="guru_id"
                        value="<?= $guru['id']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Nama Guru</label>

                        <input type="text"
                            class="form-control"
                            value="<?= $guru['nama']; ?>"
                            readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">NIP Guru</label>

                        <input type="text"
                            class="form-control"
                            value="<?= $guru['nip']; ?>"
                            readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mata Pelajaran</label>

                        <?php while ($mapel = mysqli_fetch_assoc($get_mapel)) : ?>

                            <div class="form-check">

                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="mapel[]"
                                    value="<?= $mapel['id']; ?>"
                                    <?= in_array($mapel['id'], $selected) ? 'checked' : ''; ?>>

                                <label class="form-check-label">
                                    <?= $mapel['nama']; ?>
                                </label>

                            </div>

                        <?php endwhile; ?>

                    </div>

                    <button type="submit"
                        name="submit"
                        class="btn btn-primary w-100">
                        Update Data Guru
                    </button>

                </form>

            </div>

        </div>

    </div>
</div>

<?php include("../../../layout/footer.php"); ?>