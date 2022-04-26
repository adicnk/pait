<?= $this->extend('template/exercise-latihan') ?>
<?= $this->section('content') ?>

<?php $db = \Config\Database::connect(); ?>
<div class="row">

    <?php
    // $query = $db->query("SELECT * FROM soal WHERE id=" . $soalIdx[0]);
    // foreach ($query->getResult('array') as $q) :
    $noID = session()->get('noId');
    $jawaban = session()->get('jawabanArr');
    $x = 1;
    foreach ($soal as $s) :
        if ($soalIdx[$noID - 1] == $x) :
    ?>
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <!-- <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li> -->
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kategori</li>
                        </ol>
                        <h6 class="font-weight-bolder mb-0">
                            <?php
                            $query = $db->table('kategori_soal')->getWhere(['id' => $s['kategori_soal_id']]);
                            foreach ($query->getResult('array') as $q) :
                            ?>
                                <?= $q['kname']; ?>
                            <?php endforeach ?>
                        </h6>
                    </nav>
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="card">
                <div class="card-header">
                </div>
                <div class="text-center">
                    <?php if ($s['is_picture'] == 1) : ?>
                        <img src="../favicon.ico" class="rounded" width="20%" alt="gambar_soal">
                    <?php endif ?>
                </div>
                <br />
                <?php if ($s['is_audio'] == 1) : ?>
                    <div class="mb-2 text-center">
                        <audio controls>
                            <source src="horse.ogg" type="audio/ogg">
                            <source src="horse.mp3" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                <?php endif ?>
                <div class="card-body">
                    <form method="post" action="/latihan?id=<?= $noID + 1 ?>">
                        <h5 class="card-title">Soal No. <?= $noID ?></h5>
                        <p class="card-text"> <?= $s['name']; ?></p>
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item"><b>A. </b>
                                <label>
                                    <input name="jawabanA" id="jawabanA" type="radio" onclick="pilihan(1)" />
                                    <span><?= $s['jawabanA']; ?></span>
                                </label>
                            </li>
                            <li class="list-group-item"><b>B. </b>
                                <label>
                                    <input name="jawabanB" id="jawabanB" type="radio" onclick="pilihan(2)" />
                                    <span><?= $s['jawabanB']; ?></span>
                                </label>
                            </li>
                            <li class="list-group-item"><b>C. </b>
                                <label>
                                    <input name="jawabanC" id="jawabanC" type="radio" onclick="pilihan(3)" />
                                    <span><?= $s['jawabanC']; ?></span>
                                </label>
                            </li>
                            <li class="list-group-item"><b>D. </b>
                                <label>
                                    <input name="jawabanD" id="jawabanD" type="radio" onclick="pilihan(4)" />
                                    <span><?= $s['jawabanD']; ?></span>
                                </label>
                            </li>
                            <li class="list-group-item"><b>E. </b>
                                <label>
                                    <input name="jawabanE" id="jawabanE" type="radio" onclick="pilihan(5)" />
                                    <span><?= $s['jawabanE']; ?></span>
                                </label>
                            </li>


                        </ul>

                        <?php if ($noID == $total) { ?>
                            <button type="submit" class="btn btn-primary mt-3"><i class="material-icons opacity-10">chevron_left</i>Soal No. <?= $noID - 1 ?></button>
                            <button type="submit" class="btn btn-primary mt-3">Selesai <i class="material-icons opacity-10" onclick="urlBrowserChange()">chevron_right</i></button>
                        <?php } ?>
                        <?php if ($noID == 1) { ?>
                            <button type="submit" class="btn btn-primary mt-3">Soal No. 2 <i class="material-icons opacity-10">chevron_right</i></button>
                        <?php } ?>
                        <?php if (1 < $noID and $noID < $total) { ?>
                            <button type="submit" class="btn btn-primary mt-3"><i class="material-icons opacity-10">chevron_left</i>Soal No. <?= $noID - 1 ?></button>
                            <button type="submit" class="btn btn-primary mt-3">Soal No. <?= $noID +  1 ?> <i class="material-icons opacity-10">chevron_right</i></button>
                        <?php } ?>

                    </form>
                </div>
            </div>
        <?php
            break;
        endif;
        $x++; ?>
    <?php endforeach ?>
</div>

<?= $this->endSection() ?>