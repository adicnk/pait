<?= $this->extend('template/exercise-selesai') ?>
<?= $this->section('content') ?>

<?php $db = \Config\Database::connect(); ?>
<div class="row">

    <div class="row mt-3">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">check_circle</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Jawaban Benar</p>
                        <h4 class="mb-0">2</h4>
                    </div>
                </div>
                <div class="card-footer p-3">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">highlight_off</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize"> Jawaban Salah</p>
                        <h4 class="mb-0">44</h4>
                    </div>
                </div>
                <div class="card-footer p-3">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-info shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">bookmark_added</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Soal Dijawab</p>
                        <h4 class="mb-0">72</h4>
                    </div>
                </div>
                <div class="card-footer p-3">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">bookmark_border</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Jawaban Kosong</p>
                        <h4 class="mb-0">68</h4>
                    </div>
                </div>
                <div class="card-footer p-3">
                </div>
            </div>
        </div>
    </div>

    <div class="card o-hidden border-0 shadow-lg text-center mt-5">
        <h1 class="card-title mt-3">NILAI AKHIR</h1>
        <h3 class="card-title">
        </h3>
        <div class="card-block mt-3 text-center">
            <div class="card-text">
                <div class="js-gauge js-gauge--2 js-score gauge"></div>
            </div>

            <h1 id="score-desc" class="card-text mt-3 text-success"></h1>

            <div class="row mt-3 mb-3">
                <div class="col md-6">
                    <a href="../../" class="btn btn-success mt-3 ml-4 font-weight-bolder">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>