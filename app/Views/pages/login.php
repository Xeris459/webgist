<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="admin">
    <meta name="robots" content="noindex, nofollow">
    <meta name="author" content="Lcq">
    <?= csrf_meta() ?>
    <title><?= "Login | " . TITLE ?></title>

    <!-- icon set -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/fav.ico" />

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= site_url() ?>css/sb-admin-2.css" rel="stylesheet">

    <style>
    .bg-login-image {
        /* background-image: url(<?= base_url('assets/img/preview.jpg') ?>); */
        background-size: cover;
    }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image bg-gray-200">
                                <img src="" alt="" srcset="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome!!</h1>
                                        <?= view('Myth\Auth\Views\_message_block') ?>
                                    </div>
                                    <form action="<?= route_to('login') ?>" method="post" class="user">
                                        <?= csrf_field(); ?>

                                        <div class="form-group">
                                            <input type="email" name="login"
                                                class="form-control form-control-user <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukan email Anda">
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>"
                                                id="exampleInputPassword" placeholder="Masukan Password Anda">
                                            <div class="invalid-feedback">
                                                <?= session('errors.password') ?>
                                            </div>
                                        </div>

                                        <?php if ($config->allowRemembering): ?>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="remember" class="form-check-input"
                                                    <?php if(old('remember')) : ?> checked <?php endif ?>>
                                                <?=lang('Auth.rememberMe')?>
                                            </label>
                                        </div>
                                        <?php endif; ?>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/js/sb-admin-2.min.js"></script>

</body>

</html>