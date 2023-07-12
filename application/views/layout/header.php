<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/') ?>img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url('assets/') ?>img/sman8.png">
    <title>
        Prediksi SNMPTN SMAN 8 Pekanbaru
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url('assets/') ?>css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url('assets/') ?>css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?= base_url('assets/') ?>css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url('assets/') ?>css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <link href="<?= base_url('assets/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <!-- Select Dropdown -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />


</head>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
                <img src="<?= base_url('assets/') ?>img/sman8.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">SMAN 8 Pekanbaru</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == '/PA_CindySeventina/Dashboard/') {
                                            echo "active";
                                        } ?>" href="<?= site_url('Dashboard/') ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == '/PA_CindySeventina/importfile/') {
                                            echo "active";
                                        } ?>" href="<?= site_url('importfile/') ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-paper-diploma text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data Lulusan SNMPTN</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == '/PA_CindySeventina/Peserta/') {
                                            echo "active";
                                        } ?>" href="<?= site_url('Peserta/') ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data Peserta SNMPTN</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == '/PA_CindySeventina/Predict/') {
                                            echo "active";
                                        } ?>" href="<?= site_url('Predict/') ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Masukkan Pilihan</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>