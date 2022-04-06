<?= $this->extend('template/member-admin') ?>
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
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">NIP/NIM</th>
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
                    <td><?= $index ?></td>
                    <td><?= $usr['name'] ?></td>
                    <td><?= $usr['email'] ?></td>
                    <td><?= $usr['nip'] ? $usr['nip'] : $usr['nim'] ?></td>
                    <td>
                        <a href="/form/edit/administrator/<?= $usr['id'] ?>"><img src="../../icon/edit.png" class="mr-2" /></a>
                        <a href="/administrator/delete/<?= $usr['id'] ?>"><img src="../../icon/delete.png" /></a>
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