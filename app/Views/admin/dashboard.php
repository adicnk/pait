<?= $this->extend('template/dashboard-admin') ?>
<?= $this->section('content') ?>

<?php $db = \Config\Database::connect(); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="mt-3">
        <hr>
    </div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"><strong><?= $title; ?></strong></h1>
    </div>

    <div class="mt-3">
        <hr>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Jumalah Mahasiswa -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Mahasiswa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">150</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Soal -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Soal</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">180</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Admin -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Jumlah Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-lock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Jumlah Soal Berdasarkan Kategori</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
                <canvas id="myPieChart"></canvas>
            </div>
            <div class="mt-4 text-center small">
                <?php
                $query = $db->query("SELECT * FROM kategori_soal");
                foreach ($query->getResult('array') as $qclb) :
                ?>
                    <?php switch ($qclb['id']) {
                        case 1: ?>
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i><?= $qclb['kname'] ?>
                            </span>
                        <?php break;
                        case 2: ?>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i><?= $qclb['kname'] ?>
                            </span>
                        <?php break;
                        case 3: ?>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i><?= $qclb['kname'] ?>
                            </span>
                        <?php break;
                        case 4: ?>
                            <span class="mr-2">
                                <i class="fas fa-circle text-warning"></i><?= $qclb['kname'] ?>
                            </span>
                        <?php break;
                        case 5: ?>
                            <span class="mr-2">
                                <i class="fas fa-circle text-danger"></i><?= $qclb['kname'] ?>
                            </span>
                            <?php break; ?>
                    <?php } ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>