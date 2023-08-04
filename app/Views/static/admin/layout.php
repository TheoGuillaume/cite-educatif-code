<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <title><?= $this->renderSection("title") ?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url("static/logo_angora/Logo Agora blanc.png") ?> " sizes="256x256">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php if (session()->has('notification')) : ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <?php endif ?>
    <script src="<?= base_url("assets/admin/js/require.min.js"); ?>"></script>
    <script>
        requirejs.config({
            baseUrl: '<?= site_url() ?>'
        });
    </script>
    <!-- Dashboard Core -->
    <link href="<?= base_url("assets/admin/css/dashboard.css"); ?>" rel="stylesheet" />
    <script src="<?= base_url("assets/admin/js/dashboard.js"); ?>"></script>
    <!-- c3.js Charts Plugin -->
    <link href="<?= base_url("assets/admin/plugins/charts-c3/plugin.css"); ?>" rel="stylesheet" />
    <script src="<?= base_url("assets/admin/plugins/charts-c3/plugin.js"); ?>"></script>
    <!-- Google Maps Plugin -->
    <link href="<?= base_url("assets/admin/plugins/maps-google/plugin.css"); ?>" rel="stylesheet" />
    <script src="<?= base_url("assets/admin/plugins/maps-google/plugin.js"); ?>"></script>
    <!-- Input Mask Plugin -->
    <script src="<?= base_url("assets/admin/plugins/input-mask/plugin.js"); ?>"></script>
</head>

<body class="">
    <div class="page">
        <div class="page-main">
            <div class="header py-4">
                <div class="container">
                    <div class="d-flex">
                        <a class="header-brand" href="#">
                            <!-- <img src="./demo/brand/tabler.svg" class="header-brand-img" alt="tabler logo">-->
                        </a>
                        <div class="d-flex order-lg-2 ml-auto">
                            <div class="dropdown">
                                <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                                    <span class="avatar avatar-gray"><?= ucfirst(adminuser()['nom'][0]) ?></span>
                                    <span class="ml-2 d-none d-lg-block">
                                        <span class="text-default"><?= adminuser()['nom'] ?></span>
                                        <small class="text-muted d-block mt-1"><?= adminuser()['email'] ?></small>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="<?= site_url('/admin/logout') ?>">
                                        <i class="dropdown-icon fe fe-log-out"></i> Deconnexion
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                            <span class="header-toggler-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg order-lg-first">
                            <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                                <li class="nav-item">
                                    <a href="<?= site_url('/admin/dashboard') ?>" class="nav-link <?= (current_url() == site_url('/admin/dashboard')) ? 'active' : '' ?>">
                                        <i class="fe fe-trending-up"></i> Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('/admin/structure') ?>" class="nav-link <?= (strpos(current_url(), '/admin/structure') !== false) ? 'active' : '' ?>">
                                        <i class="fe fe-database"></i> Structure
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('/admin/acteur') ?>" class="nav-link <?= (current_url() == site_url('/admin/acteur')) ? 'active' : '' ?>">
                                        <i class="fe fe-user"></i> Acteur
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('/admin/actualite') ?>" class="nav-link <?= (current_url() == site_url('/admin/actualite')) ? 'active' : '' ?>">
                                        <i class="fe fe-book-open"></i> Actualite
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-3 my-md-5">
                <div class="container">
                    <?= $this->renderSection("content") ?>

                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
                        Copyright © 2023<a href="."></a>. </a> All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
<?php echo session('nofitication') ?>
<?php if (session()->has('notification')) : ?>
    <script>
        var type = '<?php echo session('notification')[0]; ?>';
        var message = '<?php echo session('notification')[1]; ?>';
        toastr[type](message, 'Message', {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-bottom-right',
            timeOut: 5000
        });
    </script>
<?php endif ?>

</html>