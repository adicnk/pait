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

    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">NIP</th>
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
                    <td><?= $usr['nip'] ?></td>
                    <td>
                        <a href=""><img src="../../icon/edit.png" class="mr-2" /></a>
                        <a href=""><img src="../../icon/delete.png" /></a>
                    </td>
                </tr>
            <?php
                        $index++;
                    endforeach;
            ?>
            </tr>
            </tbody>
        </table>
    </div>
    <?= $pager->links('user', 'custom_pagination') ?>
</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>