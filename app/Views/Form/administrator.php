<?= $this->extend('template/form-admin') ?>
<?= $this->section('content') ?>

<?php $db = \Config\Database::connect(); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="mt-3">
        <hr>
    </div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"> <?= $title; ?></h1>
    </div>

    <div class="mt-3">
        <hr>
    </div>

    <!-- Nested Row within Card Body -->
    <div class="card o-hidden border-0 mt-3 bg-light">
        <div class="card-block mt-3">
            <div class="card-text text-center">

                <form method="post" action="../submit/administrator">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <div class="form-row align-items-right">
                            <div class="col-7">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Nama </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Masukkan Nama ......">
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-right mt-3">
                            <div class="col-5">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Email </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Masukkan Email ......">
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-right mt-3">
                            <div class="col-8">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Nomor Induk Pegawai / Mahasiswa </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Masukkan NIP/NIM ......">
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-right mt-3">
                            <div class="col-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Username </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Masukkan Username untuk Login ......">
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-right mt-3">
                            <div class="col-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Password </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Masukkan Password untuk Login ......">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block mt-3 mb-4" type="submit">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>