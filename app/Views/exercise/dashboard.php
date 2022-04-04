<?= $this->extend('template/dashboard-exercise') ?>
<?= $this->section('content') ?>


<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">weekend</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total Latihan</p>
                    <h4 class="mb-0">2</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0">terakhir latihan <span class="text-success text-sm font-weight-bolder">12/03/2022 </span></p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">check_circle</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize"> Jawaban Benar</p>
                    <h4 class="mb-0">44</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>dari sebelumnya</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">highlight_off</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Jawaban Salah</p>
                    <h4 class="mb-0">72</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> dari sebelumya</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">bookmark_added</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Nilai</p>
                    <h4 class="mb-0">68</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+15% </span>dari sebelumnya</p>
            </div>
        </div>
    </div>
</div>
<div class="row mt-5">

    <div class="card z-index-2  ">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart">
                    <canvas id="chart-line" class="chart-canvas" height="250"></canvas>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h6 class="mb-0 "> Perkembangan Latihan </h6>
            <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) naik dari latihan terakhir </p>
            <hr class="dark horizontal">
            <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> updated 16/4/2022 </p>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-lg-6 col-7">
                    <h6>Materi Pembelajaran</h6>
                    <p class="text-sm mb-0">
                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                        <span class="font-weight-bold ms-1">30 sudah selesai</span> dipelajari
                    </p>
                </div>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Materi Pembelajaran</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sub Materi</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="./assets/img/small-logos/logo-xd.svg" class="avatar avatar-sm me-3" alt="xd">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Material XD Version</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold"> $14,000 </span>
                            </td>
                            <td class="align-middle">
                                <div class="progress-wrapper w-75 mx-auto">
                                    <div class="progress-info">
                                        <div class="progress-percentage">
                                            <span class="text-xs font-weight-bold">60%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="./assets/img/small-logos/logo-atlassian.svg" class="avatar avatar-sm me-3" alt="atlassian">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Add Progress Track</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold"> $3,000 </span>
                            </td>
                            <td class="align-middle">
                                <div class="progress-wrapper w-75 mx-auto">
                                    <div class="progress-info">
                                        <div class="progress-percentage">
                                            <span class="text-xs font-weight-bold">10%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-info w-10" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="./assets/img/small-logos/logo-slack.svg" class="avatar avatar-sm me-3" alt="team7">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Fix Platform Errors</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold"> Not set </span>
                            </td>
                            <td class="align-middle">
                                <div class="progress-wrapper w-75 mx-auto">
                                    <div class="progress-info">
                                        <div class="progress-percentage">
                                            <span class="text-xs font-weight-bold">100%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-success w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="./assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm me-3" alt="spotify">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Launch our Mobile App</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold"> $20,500 </span>
                            </td>
                            <td class="align-middle">
                                <div class="progress-wrapper w-75 mx-auto">
                                    <div class="progress-info">
                                        <div class="progress-percentage">
                                            <span class="text-xs font-weight-bold">100%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-success w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="./assets/img/small-logos/logo-jira.svg" class="avatar avatar-sm me-3" alt="jira">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Add the New Pricing Page</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold"> $500 </span>
                            </td>
                            <td class="align-middle">
                                <div class="progress-wrapper w-75 mx-auto">
                                    <div class="progress-info">
                                        <div class="progress-percentage">
                                            <span class="text-xs font-weight-bold">25%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-info w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="25"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="./assets/img/small-logos/logo-invision.svg" class="avatar avatar-sm me-3" alt="invision">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Redesign New Online Shop</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold"> $2,000 </span>
                            </td>
                            <td class="align-middle">
                                <div class="progress-wrapper w-75 mx-auto">
                                    <div class="progress-info">
                                        <div class="progress-percentage">
                                            <span class="text-xs font-weight-bold">40%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-info w-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>