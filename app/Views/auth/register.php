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
    <link href="<?= base_url(); ?>/template/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/style.css">

</head>

<body>
    <main>
        <div class=" container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center py-4">
                                        <a href="index.html" class="logo d-flex align-items-center w-auto">
                                            <img src="<?= base_url(); ?>/template/assets/img/logo-login.png" style="max-height: 100px;" alt="">
                                        </a>
                                    </div><!-- End Logo -->
                                    <?= view('Myth\Auth\Views\_message_block') ?>
                                    <form action="<?= url_to('register') ?>" method="post" class="row g-3 needs-validation" novalidate>
                                        <?= csrf_field() ?>

                                        <div class="col-12">
                                            <label for="email"><?= lang('Auth.email') ?></label>
                                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                            <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                                        </div>

                                        <div class="col-12">
                                            <label for="username"><?= lang('Auth.username') ?></label>
                                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                        </div>

                                        <div class="col-12">
                                            <label for="password"><?= lang('Auth.password') ?></label>
                                            <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                        </div>

                                        <div class="col-12">
                                            <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                                            <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit"><?= lang('Auth.register') ?></button>
                                        </div>
                                        <div class="col-12">
                                            <p><?= lang('Auth.alreadyRegistered') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.signIn') ?></a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="text-center">
                                <div class="credits">
                                    &copy; Copyright <strong><span>2023. PT Nusamitek Putra Jaya</span></strong>. All Rights Reserved
                                </div>
                            </div><!-- End Footer -->

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
    <script src="<?= base_url(); ?>/template/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>/template/assets/js/main.js"></script>



    <script>
        function previewImg() {
            const gambar = document.querySelector('#gambar');
            const gambarLabel = document.querySelector('.custom-file-input');
            const imgPreview = document.querySelector('.img-preview');

            gambarLabel.textContent = gambar.files[0].name;

            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);

            fileGambar.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
    <!-- <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script> -->

    <!-- Alert close-->
</body>

</html>