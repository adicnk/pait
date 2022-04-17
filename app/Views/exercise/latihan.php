<?= $this->extend('template/exercise-latihan') ?>
<?= $this->section('content') ?>


<div class="row">

    <?php
    $query = $db->query("SELECT * FROM event WHERE id=" . $soalIdx[0]);
    foreach ($query->getResult('array') as $q) :
    ?>
        <div class="card">
            <div class="card-header">
            </div>
            <div class="text-center">
                <img src="../favicon.ico" class="rounded" width="20%" alt="gambar_soal">
            </div>
            <br />
            <div class="mb-2 text-center">
                <audio controls>
                    <source src="horse.ogg" type="audio/ogg">
                    <source src="horse.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
            <div class="card-body">
                <h5 class="card-title">Soal No. 1</h5>
                <p class="card-text">Soal ini adalah soal no satu tolong diperhatikan jawabannya.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>A. </b>Jawaban A</li>
                    <li class="list-group-item"><b>B. </b>Jawaban B</li>
                    <li class="list-group-item"><b>C. </b>Jawaban C</li>
                    <li class="list-group-item"><b>D. </b>Jawaban D</li>
                    <li class="list-group-item"><b>E. </b>Jawaban E</li>
                </ul>
                <a href="" class="btn btn-primary mt-3">Soal No.2</a>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?= $this->endSection() ?>