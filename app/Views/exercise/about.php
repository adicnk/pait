<?= $this->extend('template/dashboard-profile') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">About PAIT</h3>
                <hr />
                <div class="subheading mb-3">Physical Assesment Based On interactive Technology</div>
            </div>
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <div>Pembelajaran praktek membutuhkan media pembelajaran yang efektif sehingga
                            menimbulkansemangat dan ketertarikan mahasiswa dengan penggunaan teknologi
                            yang lebih efektif dengan memperkecil faktor resiko.</div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="/dashboard" class="btn btn-primary">DASHBOARD</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>