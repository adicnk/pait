<?= $this->extend('template/member-soal') ?>
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

    <div>
        <div class="row">
            <div class="col"></div>
            <div class="col-4">
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukkan Kategori" name="keyword">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="30px" style="text-align: center">#</th>
                    <th scope="col" width="450px" style="text-align: center">Soal</th>
                    <th scope="col" width="50px">Dipilih</th>
                    <th scope="col" width="250px">Kategori</th>
                    <th scope="col" width="3px" style="text-align: center">Gambar</th>
                    <th scope="col" width="3px" style="text-align: center">Suara</th>
                    <th scope="col" width="100px"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $index = 1 + (5 * ($currentPage - 1));
                    foreach ($soal as $s) :
                    ?>
                <tr>
                    <td style="text-align: center"><?= $index ?></td>
                    <td><?= substr($s['name'], 0, 110) . ' .....' ?></td>
                    <td style="text-align: center"><?= $s['is_choosen'] == 1 ? '<img src="../../icon/check.png" class="mr-2" />' : '<img src="../../icon/not_available.png" class="mr-2" />'; ?></td>
                    <td><?= $s['kategori_soal_id'] ? $s['kname'] : '-' ?></td>
                    <td style="text-align: center"><?= $s['is_picture'] == 1 ? '<img src="../../icon/check.png" class="mr-2" />' : '<img src="../../icon/not_available.png" class="mr-2" />' ?></td>
                    <td style="text-align: center"> <?= $s['is_audio'] == 1 ? '<img src="../../icon/check.png" class="mr-2" />' : '<img src="../../icon/not_available.png" class="mr-2" />'; ?></td>
                    <td>
                        <a href="/edit/soal/<?= $s['idx'] ?>"><img src="../../icon/edit.png" class="mr-2" /></a>
                        <a href="/delete/soal/<?= $s['idx'] ?>"><img src="../../icon/delete.png" /></a>
                    </td>
                </tr>
            <?php
                        $index++;
                    endforeach;
            ?>

            </tbody>
        </table>
    </div>
    <?= $pager->links('soal', 'custom_pagination') ?>
</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>