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
        <h1 class="h3 mb-0 text-gray-800"><strong><?= $title; ?></strong></h1>
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
                                    <div class="input-group-text"><strong>Nama</strong></div>
                                    <input type="text" class="form-control" id="namaAdmin" placeholder="Masukkan Nama ......" onfocusin="yellowin(this);" onfocusout="whiteout(this)" onkeypress="return alphaOnly(event);">
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-right mt-3">
                            <div class="col-6">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><strong>Email</strong></div>
                                    <input type="email" class="form-control" id="emailAdmin" placeholder="Masukkan Email ......" onfocusin="yellowin(this);" onfocusout="whiteout(this)">
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-right mt-3">
                            <div class="col-8">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><strong>Nomor Induk Pegawai / Mahasiswa</strong></div>
                                    <input type="text" class="form-control" id="nimnikAdmin" placeholder="Masukkan NIP/NIM ......" onfocusin="yellowin(this);" onfocusout="whiteout(this)" onkeypress="return numOnly(event);">
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-right mt-3">
                            <div class="col-5">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><strong>Username</strong></div>
                                    <input type="text" class="form-control" id="usernameAdmin" placeholder="Masukkan Username untuk Login ......" onfocusin="yellowin(this);" onfocusout="whiteout(this)" onkeypress="return alphaOnly(event);">
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-right mt-3">
                            <div class="col-5">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><strong>Password</strong></div>
                                    <input type="password" class="form-control" id="passwordAdmin" placeholder="Masukkan Password untuk Login ......" onfocusin="yellowin(this);" onfocusout="whiteout(this)">
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