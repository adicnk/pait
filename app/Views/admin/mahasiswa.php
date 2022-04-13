<?= $this->extend('template/member-mahasiswa') ?>
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
                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="keyword">
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
                    <th scope="col" style="text-align: center">#</th>
                    <th scope="col" width="300px">Nama</th>
                    <th scope="col" width="150px">Jurusan</th>
                    <th scope="col" width="300px" style="text-align: center">Email</th>
                    <th scope="col" style="text-align: center">NIM</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $index = 1 + (5 * ($currentPage - 1));
                    foreach ($user as $usr) :
                    ?>
                <tr>
                    <td style="text-align: center"><?= $index ?></td>
                    <td><?= $usr['name'] ?></td>
                    <td><?= $usr['jname'] ? $usr['jname'] : '<img src="../../icon/not_available.png" class="mr-2" />' ?></td>
                    <td style="text-align: center"><?= $usr['email'] ? $usr['email'] : '<img src="../../icon/not_available.png" class="mr-2" />' ?></td>
                    <td style="text-align: center"><?= $usr['nip'] ? $usr['nip'] : $usr['nim'] ?></td>
                    <td>
                        <a href="/edit/user/<?= $usr['id'] ?>"><img src="../../icon/edit.png" class="mr-2" /></a>
                        <a href="/delete/admin/<?= $usr['id'] ?>"><img src="../../icon/delete.png" /></a>
                    </td>
                </tr>
            <?php
                        $index++;
                    endforeach;
            ?>

            </tbody>
        </table>
    </div>
    <?= $pager->links('user', 'custom_pagination') ?>
</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>