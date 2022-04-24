<?= $this->extend('template/edit-user') ?>
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

                <?php foreach ($user as $usr) : ?>
                    <form method="post" action="../../submitEdit/admin/<?= $usr['idx'] ?>?url=<?= $url ?>">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <div class="form-row align-items-right">
                                <div class="col-5">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><strong>Role Admin</strong></div>
                                        <select class="form-control" name="roleUser" id="roleUser" onfocusin="yellowin(this);" onfocusout="whiteout(this)">
                                            <option value=1 <?= $usr['role_id'] == 1 ? 'selected' : ''; ?>>Administrator</option>
                                            <option value=2 <?= $usr['role_id'] == 2 ? 'selected' : ''; ?>>Member</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row align-items-right mt-3">
                                <div class="col-5">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><strong>Status di Kampus</strong></div>
                                        <select class="form-control" name="statusUser" id="statusUser" onfocusin="yellowin(this);" onfocusout="whiteout(this)" onchange="myStatusOption()">
                                            <option value=1 <?= $usr['status_id'] == 1 ? 'selected' : ''; ?>>Mahasiswa</option>
                                            <option value=2 <?= $usr['status_id'] == 2 ? 'selected' : ''; ?>>Staff</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row align-items-right mt-3">
                                <div class="col-7">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><strong>Nama</strong></div>
                                        <input type="text" name="namaUser" id="namaUser" value="<?= $usr['name'] ?>" class="form-control" placeholder="Masukkan Nama ......" onfocusin="yellowin(this);" onfocusout="whiteout(this)" onkeypress="return alphaOnly(event);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row align-items-right mt-3">
                                <div class="col-5">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><strong>Jurusan</strong></div>
                                        <select class="form-control" name="jurusanUser" id="jurusanUser" onfocusin="yellowin(this);" onfocusout="whiteout(this)" <?= $usr['status_id'] == 2 ? 'disabled' : '' ?>>
                                            <option value=1 <?= $usr['jurusan_id'] == 1 ? 'selected' : ''; ?>>D3 Keperawatan</option>
                                            <option value=2 <?= $usr['jurusan_id'] == 2 ? 'selected' : ''; ?>>S1 Profesi Ners</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row align-items-right mt-3">
                                <div class="col-6">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><strong>Email</strong></div>
                                        <input type="email" name="emailUser" id="emailUser" value="<?= $usr['email'] ?>" class="form-control" placeholder="Masukkan Email ......" onfocusin="yellowin(this);" onfocusout="whiteout(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row align-items-right mt-3">
                                <div class="col-8">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><strong>Nomor Induk Pegawai / Mahasiswa</strong></div>
                                        <input type="text" name="nimnipUser" id="nimnipUser" value="<?= $usr['nip'] ? $usr['nip'] : $usr['nim'] ?>" class="form-control" placeholder="Masukkan NIP/NIM ......" onfocusin="yellowin(this);" onfocusout="whiteout(this)" onkeypress="return numOnly(event);">
                                    </div>
                                </div>
                            </div>

                            <?php $queryClass = $db->table('login')->getWhere(['user_id' => $usr['idx']]);
                            foreach ($queryClass->getResult('array') as $qcls) : ?>

                                <div class="form-row align-items-right mt-3">
                                    <div class="col-5">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><strong>Username</strong></div>
                                            <input type="text" name="usernameUser" id="usernameUser" value="<?= $qcls['username'] ?>" class="form-control" placeholder="Masukkan Username untuk Login ......" onfocusin="yellowin(this);" onfocusout="whiteout(this)" onkeypress="return alphaOnly(event);">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row align-items-right mt-3">
                                    <div class="col-5">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><strong>Password</strong></div>
                                            <input type="password" name="passwordUser" id="passwordUser" value="<?= $qcls['password'] ?>" class="form-control" placeholder="Masukkan Password untuk Login ......" onfocusin="yellowin(this);" onfocusout="whiteout(this)">
                                        </div>
                                    </div>
                                </div>
                        </div>

                    <?php endforeach ?>

                    <button class="btn btn-lg btn-primary btn-block mt-3 mb-4" type="submit">SIMPAN</button>

                    </form>
                <?php endforeach ?>
                <a href=<?= $url == 'admin' ? '../../admin/user' : '../../admin/mahasiswa' ?> class="btn btn-lg btn-danger btn-block mt-3 mb-4">CANCEL</a>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>