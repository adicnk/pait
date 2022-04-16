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

                <?php foreach ($soal as $s) : ?>
                    <form method="post" action="../../submitedit/soal/<?= $s['idx'] ?>">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <div class="form-row align-items-right">
                                <div class="col-5">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><strong>Kategori</strong></div>
                                        <select class="form-control" name="kategoriSoal" id="kategoriSoal" onfocusin="yellowin(this);" onfocusout="whiteout(this)">
                                            <option value=1 <?= $s['kategori_soal_id'] == 1 ? 'selected' : '' ?>>Pemeriksaan Ektrimitas</option>
                                            <option value=2 <?= $s['kategori_soal_id'] == 2 ? 'selected' : '' ?>>Pemeriksaan Kepala dan Leher</option>
                                            <option value=3 <?= $s['kategori_soal_id'] == 3 ? 'selected' : '' ?>>Pemeriksaan Dada</option>
                                            <option value=4 <?= $s['kategori_soal_id'] == 4 ? 'selected' : '' ?>>Pemeriksaan Perut</option>
                                            <option value=5 <?= $s['kategori_soal_id'] == 5 ? 'selected' : '' ?>>Pemeriksaan Genitalia dan Rectum</option>
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
                                                        <textarea class="form-control" name="isiSoal" id="isiSoal" rows="10"><?= $s['name'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row align-items-right mt-3">
                                                <div class="col-2">
                                                    <div class="input-group-prepend">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="isPicture" id="isPicture" onclick="myPicture()" <?= $s['is_picture'] == 1 ? 'checked' : ''; ?>>
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
                                                        <input type="file" class="custom-file-input" name="fileGambar" id="fileGambar" <?= $s['is_picture'] == 1 ? '' : 'disabled' ?>>
                                                        <label class="custom-file-label" for="fileGambar"><?= $s['picture_url'] ? $s['picture_url'] : 'Pilih File Gambar' ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row align-items-right mt-3">
                                                <div class="col-2">
                                                    <div class="input-group-prepend">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="isAudio" id="isAudio" onclick="myAudio()" <?= $s['is_audio'] == 1 ? 'checked' : ''; ?>>
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
                                                        <input type="file" class="custom-file-input" name="fileAudio" id="fileAudio" <?= $s['is_audio'] == 1 ? '' : 'disabled' ?>>
                                                        <label class="custom-file-label" for="fileAudio"><?= $s['audio_url'] ? $s['audio_url'] : 'Pilih File Audio' ?></label>
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

                                <?php $queryClass = $db->table('jawaban')->getWhere(['soal_id' => $s['idx']]);
                                foreach ($queryClass->getResult('array') as $qc) : ?>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="form-row align-items-right mt-3">
                                                <div class="col-12">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><strong>Jawaban Option A</strong></div>
                                                        <textarea class="form-control" name="jawabanA" id="jawabanA" rows="3"><?= $qc['jawabanA'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row align-items-right mt-3">
                                                <div class="col-12">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><strong>Jawaban Option B</strong></div>
                                                        <textarea class="form-control" name="jawabanB" id="jawabanB" rows="3"><?= $qc['jawabanB'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row align-items-right mt-3">
                                                <div class="col-12">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><strong>Jawaban Option C</strong></div>
                                                        <textarea class="form-control" name="jawabanC" id="jawabanC" rows="3"><?= $qc['jawabanC'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row align-items-right mt-3">
                                                <div class="col-12">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><strong>Jawaban Option D</strong></div>
                                                        <textarea class="form-control" name="jawabanD" id="jawabanD" rows="3"><?= $qc['jawabanD'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row align-items-right mt-3">
                                                <div class="col-12">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><strong>Jawaban Optiion E</strong></div>
                                                        <textarea class="form-control" name="jawabanE" id="jawabanE" rows="3"><?= $qc['jawabanE'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row align-items-right mt-3">
                                                <div class="col-5">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><strong>Jawaban yg Benar</strong></div>
                                                        <select class="form-control" name="jawabanBenar" id="jawabanBenar" onfocusin="yellowin(this);" onfocusout="whiteout(this)">
                                                            <option value=1 <?= $qc['jawaban_benar'] == 1 ? 'selected' : '' ?>>Option A</option>
                                                            <option value=2 <?= $qc['jawaban_benar'] == 2 ? 'selected' : '' ?>>Option B</option>
                                                            <option value=3 <?= $qc['jawaban_benar'] == 3 ? 'selected' : '' ?>>Option C</option>
                                                            <option value=4 <?= $qc['jawaban_benar'] == 4 ? 'selected' : '' ?>>Option D</option>
                                                            <option value=5 <?= $qc['jawaban_benar'] == 5 ? 'selected' : '' ?>>Option E</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                        </div>
                                    </div>
                            </div>

                            <div class="form-row align-items-right mt-5">
                                <div class="col-4">
                                    <div class="input-group-prepend">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="isChoosen" id="isChoosen" <?= $s['is_choosen'] == 1 ? 'checked' : '' ?>>
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
                <?php endforeach ?>
                <a href="../../admin/soal" class="btn btn-lg btn-danger btn-block mt-3 mb-4">CANCEL</a>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>