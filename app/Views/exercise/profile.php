<?= $this->extend('template/dashboard-profile') ?>
<?= $this->section('content') ?>

<?php foreach ($user as $usr) { ?>
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0"><?= $usr['name'] ?></h3>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <div class="subheading mb-3">Jurusan : <?= $usr['jname']; ?></div>
                            <div>Email : <?= $usr['email'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p>Nilai Latihan Rata-rata : <?= $nilai_ratarata ?></p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?= $this->endSection() ?>