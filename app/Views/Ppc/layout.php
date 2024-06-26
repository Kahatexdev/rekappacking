<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $Judul ?></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/images/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/images/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/favicon-16x16.png') ?>">
    <!-- Pignose Calender -->
    <link href=" <?= base_url('assets/plugins/pg-calendar/css/pignose.calendar.min.css') ?>" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href=" <?= base_url('assets/plugins/chartist/css/chartist.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') ?>">

    <!-- Custom Stylesheet -->
    <link href="<?= base_url('assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/plugins/tables/css/datatable/select.dataTables.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/node_modules/sweetalert2/dist/sweetalert2.min.css') ?>" rel="stylesheet">

    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <!-- <script src="<?= base_url('assets\plugins\jquery\jquery.min.js') ?>"> -->

    </script>


</head>

<body>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">


        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="<?= base_url('assets/images/small.png') ?>" alt=""> </b>
                    <span class="logo-compact"><img src="<?= base_url('assets/images/small.png') ?>" alt=""></span>
                    <span class="brand-title">
                        <img src="<?= base_url('assets/images/logo.png') ?>" alt="">
                    </span>
                </a>
            </div>
        </div>

        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <ul class="clearfix">
                        <li>

                            <h3 class="mt-4 mx-5 text-info"> Rekap Packing System - <?= $User ?></h3>
                        </li>
                    </ul>
                </div>
                <div class="header-right">
                    <ul class="clearfix">

                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">

                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 Notif</span>
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-2">5</span>
                                    </a>
                                </div>
                                <!-- <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Notif Pemberitahuan</h6>
                                                    <span class="notification-text">Benang</span>
                                                </div>
                                            </a>
                                        </li>

                                    </ul>

                                </div> -->
                            </div>
                        </li>
                        <li class="icons dropdown">
                            <button type="button" class="btn btn-white" data-toggle="modal" data-target="#basicModal"> <i class="icon-key"></i> <span>Logout</span></button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a href="<?= base_url('/ppc') ?>" aria-expanded="false">
                            <i class="icon-home menu-icon"></i><span class="nav-text">Master Data</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('ppc/requestpacking') ?>" aria-expanded="false">
                            <i class="icon-chart menu-icon"></i><span class="nav-text">Permintaan (+) Packing</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-1">
                <div class="modal fade" id="basicModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Logout</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">Apakah yakin ingin keluar</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                                <a href="<?= base_url('logout') ?>" class="btn btn-primary">Ya</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?= $this->renderSection('content'); ?>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; RnD TEAM - SYSTEM DEVELOPMENT</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->


    <script src="<?= base_url('assets/plugins/common/common.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/custom.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/settings.js') ?>"></script>
    <script src="<?= base_url('assets/js/gleek.js') ?>"></script>
    <script src="<?= base_url('assets/js/styleSwitcher.js') ?>"></script>
    <script src="<?= base_url('assets/node_modules/sweetalert2/dist/sweetalert2.min.js') ?>"></script>

    <script src="<?= base_url('assets/plugins/tables/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') ?>"></script>

    <!-- Chartjs -->

    <script src="<?= base_url('assets/plugins/chart.js/Chart.bundle.min.js') ?>"></script>
    <!-- Circle progress -->
    <script src="<?= base_url('assets/plugins/circle-progress/circle-progress.min.js') ?>"></script>
    <!-- Datamap -->
    <script src="<?= base_url('assets/plugins/d3v3/index.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/topojson/topojson.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/datamaps/datamaps.world.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/dashboard/dashboard-1.js') ?>"></script>

    <!-- Morrisjs -->
    <script src="<?= base_url('assets/plugins/raphael/raphael.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/morris/morris.min.js') ?>"></script>
    <!-- Pignose Calender -->
    <script src="<?= base_url('assets/plugins/moment/moment.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/pg-calendar/js/pignose.calendar.min.js') ?>"></script>
    <!-- ChartistJS -->
    <script src="<?= base_url('assets/plugins/chartist/js/chartist.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') ?>"></script>







</body>

</html>