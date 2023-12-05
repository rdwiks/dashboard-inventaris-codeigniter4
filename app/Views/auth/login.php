<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="dashboard" name="description">
    <meta content="administrator, dashboard, nusamitek" name="keywords">
    <title>Login</title>
    <!-- Logo Brands -->
    <link rel="icon" href="<?= base_url(); ?>/template/assets/img/logo-icon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor Css -->
    <link href="<?= base_url(); ?>/template/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/template/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/template/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/template/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/template/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/template/assets/vendor/remixicon/remixicon.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/style.css">

</head>

<body style="background-image: url(../template/assets/img/background-login.png); background-size:cover;   background-repeat:no-repeat; float:right; z-index: -1;">
    <main>
        <div class=" container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <div class="d-flex justify-content-center py-4">
                                            <a class="logo d-flex align-items-center w-auto">
                                                <img src="<?= base_url(); ?>/template/assets/img/logo-login.png" style="max-height: 100px;" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <?= view('Myth\Auth\Views\_message_block') ?>

                                    <form action="<?= url_to('login') ?>" method="post" class="row g-3 needs-validation" novalidate>
                                        <?= csrf_field(); ?>
                                        <?php if ($config->validFields === ['email']) : ?>
                                            <div class="col-12">
                                                <label for="login" class="form-label"><?= lang('Auth.email') ?></label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="email" name="username" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>" required>
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.login') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="col-12">
                                                <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                                                <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>" required>
                                                <div class="invalid-feedback">
                                                    <?= session('errors.login') ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-12">
                                            <label for="password"><?= lang('Auth.password') ?></label>
                                            <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.password') ?>
                                            </div>
                                        </div>
                                        <?php if ($config->allowRemembering) : ?>
                                            <div class="col-12">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                                    <?= lang('Auth.rememberMe') ?>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit"><?= lang('Auth.loginAction') ?></button>
                                        </div>
                                        <?php if ($config->allowRegistration) : ?>
                                            <div class="col-12">
                                                <p class="small mb-0">Don't have account? <a href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($config->activeResetter) : ?>
                                            <div class="col-12">
                                                <p class="small mb-0">Forgate ? <a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
                                            <?php endif; ?>
                                            </div>
                                    </form>
                                    <div class="container">
                                        <div class="row text-center  mb-4">
                                            <div class="credits" style="font-size: small;">
                                                &copy; Copyright <strong><span>2023. PT Nusamitek Putra Jaya</span></strong>. All Rights Reserved
                                            </div>
                                        </div>
                                    </div><!-- End Footer -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <!-- Site wrapper -->




    <!-- Button Top Back -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style="background-color: black;"><i class="bi bi-arrow-up-short"></i></a>


    <!-- Control Sidebar -->
    <!-- Vendor JS Files -->
    <script src="<?= base_url(); ?>/template/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/quill/quill.min.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>/template/assets/js/main.js"></script>

</body>

</html>