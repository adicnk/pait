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

                <form method="post" action="../submit/soal">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <div class="form-row align-items-right">
                            <div class="col-5">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><strong>Kategori</strong></div>
                                    <select class="form-control" name="kategoriSoal" id="kategoriSoal" onfocusin="yellowin(this);" onfocusout="whiteout(this)">
                                        <option value=1>Pemeriksaan Ektrimitas</option>
                                        <option value=2>Pemeriksaan Kepala dan Leher</option>
                                        <option value=3>Pemeriksaan Dada</option>
                                        <option value=4>Pemeriksaan Perut</option>
                                        <option value=5>Pemeriksaan Genitalia dan Rectum</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="accordion mt-5" id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Bagian Pertanyaan
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="form-row align-items-right mt-3">
                                            <div class="col-12">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><strong>Isi Soal</strong></div>
                                                    <textarea class="form-control" name="isiSoal" id="isiSoal" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row align-items-right mt-3">
                                            <div class="col-2">
                                                <div class="input-group-prepend">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="isPicture" id="isPicture" onclick="myPicture()">
                                                        <label class="form-check-label" for="isPicture">
                                                            Gambar
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row align-items-right mt-3">
                                            <div class="col-7">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="fileGambar" id="fileGambar" disabled>
                                                    <label class="custom-file-label" for="fileGambar">Pilih File Gambar</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row align-items-right mt-3">
                                            <div class="col-2">
                                                <div class="input-group-prepend">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="isAudio" id="isAudio" onclick="myAudio()">
                                                        <label class="form-check-label" for="isAudio">
                                                            Audio
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row align-items-right mt-3">
                                            <div class="col-7">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="fileAudio" id="fileAudio" disabled>
                                                    <label class="custom-file-label" for="fileAudio">Pilih File Audio</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Bagian Jawaban
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="form-row align-items-right mt-3">
                                        <div class="col-12">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><strong>Jawaban Option A</strong></div>
                                                <textarea class="form-control" name="jawabanA" id="jawabanA" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-right mt-3">
                                        <div class="col-12">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><strong>Jawaban Option B</strong></div>
                                                <textarea class="form-control" name="jawabanB" id="jawabanB" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-right mt-3">
                                        <div class="col-12">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><strong>Jawaban Option C</strong></div>
                                                <textarea class="form-control" name="jawabanC" id="jawabanC" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-right mt-3">
                                        <div class="col-12">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><strong>Jawaban Option D</strong></div>
                                                <textarea class="form-control" name="jawabanD" id="jawabanD" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-right mt-3">
                                        <div class="col-12">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><strong>Jawaban Optiion E</strong></div>
                                                <textarea class="form-control" name="jawabanE" id="jawabanE" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-right mt-3">
                                        <div class="col-5">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><strong>Jawaban yg Benar</strong></div>
                                                <select class="form-control" name="jawabanBenar" id="jawabanBenar" onfocusin="yellowin(this);" onfocusout="whiteout(this)">
                                                    <option value=1>Option A</option>
                                                    <option value=2>Option B</option>
                                                    <option value=3>Option C</option>
                                                    <option value=4>Option D</option>
                                                    <option value=5>Option E</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row align-items-right mt-5">
                            <div class="col-4">
                                <div class="input-group-prepend">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="isChoosen" id="isChoosen">
                                        <label class="form-check-label" for="isChoosen">
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