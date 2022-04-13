<?= $this->extend('template/delete-user') ?>
<?= $this->section('content') ?>

<?php $db = \Config\Database::connect(); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="mt-3">
        <hr>
    </div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>
    <a class="btn btn-primary mt-3 mb-4" href="../../../admin/<?= $url ?>">Kembali ke List</a>
    <div class="mt-3">
        <hr>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>