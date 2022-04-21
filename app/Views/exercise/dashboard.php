<?= $this->extend('template/dashboard-exercise') ?>
<?= $this->section('content') ?>


<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">weekend</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total Latihan</p>
                    <?php if ($totalLatihan > 0) : ?>
                        <h4 class="mb-0"> <?= $totalLatihan ?></h4>
                    <?php endif ?>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <?php if ($totalLatihan > 0) : ?>
                    <p class="mb-0">terakhir latihan <span class="text-success text-sm font-weight-bolder"><?= substr($lastLatihan, 0, 10) ?></span></p>
                <?php endif ?>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">check_circle</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize"> Jawaban Benar</p>
                    <h4 class="mb-0"> <?= $benar ?></h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <?php if ($totalLatihan > 1) : ?>
                    <?php if ($persenBenar < 0) { ?>
                        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"> <?= $persenBenar . '%' ?></span> dari sebelumnya</p>
                    <?php } else { ?>
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"> +<?= $persenBenar . '%' ?></span>% dari sebelumnya</p>
                    <?php } ?>
                <?php endif ?>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">highlight_off</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Jawaban Salah</p>
                    <h4 class="mb-0"> <?= $salah ?></h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <?php if ($totalLatihan > 1) : ?>
                    <?php if ($persenSalah < 0) { ?>
                        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"> <?= $persenSalah . '%' ?></span> dari sebelumnya</p>
                    <?php } else { ?>
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"> +<?= $persenSalah . '%' ?></span>% dari sebelumnya</p>
                    <?php } ?>
                <?php endif ?>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">bookmark_added</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Nilai</p>
                    <h4 class="mb-0"> <?= $lastScore ?></h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <?php if ($totalLatihan > 1) : ?>
                    <?php if ($persenScore < 0) { ?>
                        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"> <?= $persenScore . '%' ?></span> dari sebelumnya</p>
                    <?php } else { ?>
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"> +<?= $persenScore . '%' ?></span>% dari sebelumnya</p>
                    <?php } ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<div class="row mt-5">

    <div class="card z-index-2  ">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart">
                    <canvas id="chart-line" class="chart-canvas" height="250"></canvas>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h6 class="mb-0 "> Perkembangan Latihan </h6>
            <?php if ($totalLatihan > 1) : ?>
                <?php if ($persenScore < 0) { ?>
                    <p class="text-sm "> (<span class="font-weight-bolder"><?= $persenScore . '%' ?></span>) turun dari latihan terakhir </p>
                <?php } else { ?>
                    <p class="text-sm "> (<span class="font-weight-bolder"><?= $persenScore . '%' ?></span>) naik dari latihan terakhir </p>
                <?php } ?>
            <?php endif ?>
            <hr class="dark horizontal">
            <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> updated : <?= $lastLatihan ?> </p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>