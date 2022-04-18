<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../favicon.ico">
    <title>
        <?= $title ?>
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="./material_assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./material_assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../../material_assets/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <div class="container-fluid py-4">

            <?= $this->renderSection('content'); ?>

            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                PPNI JABAR ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-muted" target="_blank">About The Application</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    <!--   Core JS Files   -->
    <script src="./material_assets/js/core/popper.min.js"></script>
    <script src="./material_assets/js/core/bootstrap.min.js"></script>
    <script src="./material_assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./material_assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./material_assets/js/plugins/chartjs.min.js"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./material_assets/js/material-dashboard.min.js?v=3.0.2"></script>

    <script>
        function urlBroserChange() {
            alert();
            history.pushState("object or string representing the state of the page", "Score Latihan - PAIT", "/latihan/selesai");
        }

        function pilihan(value) {
            $option1 = document.getElementById("jawabanA");
            $option2 = document.getElementById("jawabanB");
            $option3 = document.getElementById("jawabanC");
            $option4 = document.getElementById("jawabanD");
            $option5 = document.getElementById("jawabanE");
            switch (value) {
                case 1:
                    if ($option1.checked) {
                        $option2.checked = false;
                        $option3.checked = false;
                        $option4.checked = false;
                        $option5.checked = false;
                    }
                    break;
                case 2:
                    if ($option2.checked) {
                        $option1.checked = false;
                        $option3.checked = false;
                        $option4.checked = false;
                        $option5.checked = false;
                    }
                    break;
                case 3:
                    if ($option3.checked) {
                        $option1.checked = false;
                        $option2.checked = false;
                        $option4.checked = false;
                        $option5.checked = false;
                    }
                    break;
                case 4:
                    if ($option4.checked) {
                        $option1.checked = false;
                        $option2.checked = false;
                        $option3.checked = false;
                        $option5.checked = false;
                    }
                    break;
                case 5:
                    if ($option5.checked) {
                        $option1.checked = false;
                        $option2.checked = false;
                        $option3.checked = false;
                        $option4.checked = false;
                    }
                    break;
            }
        }
    </script>
</body>

</html>