<?= $this->extend('template/form-soal') ?>
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

                <form method="post" action="../submit/admin">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <div class="form-row align-items-right">
                            <div class="col-5">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><strong>Kategori</strong></div>
                                    <select class="form-control" name="roleUser" id="roleUser" onfocusin="yellowin(this);" onfocusout="whiteout(this)">
                                        <option value=1>Pemeriksaan Ektrimitas</option>
                                        <option value=2>Pemeriksaan Kepala dan Leher</option>
                                        <option value=2>Dada</option>
                                        <option value=2>Perut</option>
                                        <option value=2>Genitalia dan Rectum</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-right mt-3">
                            <div class="col-12">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><strong>Isi Soal</strong></div>
                                    <textarea class="form-control" name="isiSoal" id="isiSoal" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-right mt-3">
                            <div class="col-2">
                                <div class="input-group-prepend">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Gambar
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-right mt-3">
                            <div class="col-7">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><strong>File Gambar</strong></div>
                                    <input type="text" name="namaUser" id="namaUser" class="form-control" placeholder="Masukkan File Gambar ......" onfocusin="yellowin(this);" onfocusout="whiteout(this)" onkeypress="return alphaOnly(event);">
                                    <button type="button" class="btn btn-secondary btn-sm">..</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-right mt-3">
                            <div class="col-2">
                                <div class="input-group-prepend">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Audio
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-right mt-3">
                            <div class="col-7">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><strong>File Audio</strong></div>
                                    <input type="text" name="namaUser" id="namaUser" class="form-control" placeholder="Masukkan File Audio ......" onfocusin="yellowin(this);" onfocusout="whiteout(this)" onkeypress="return alphaOnly(event);">
                                    <button type="button" class="btn btn-secondary btn-sm">..</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-right mt-5">
                            <div class="col-4">
                                <div class="input-group-prepend">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Soal ini dipilih masuk ke latihan ujian
                                        </label>
                                    </div>
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