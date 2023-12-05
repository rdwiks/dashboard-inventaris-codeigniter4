<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="dashboard" name="description">
    <meta content="administrator, dashboard, nusamitek" name="keywords">
    <title><?= $title; ?></title>
    <!-- Logo Brands -->
    <link rel="icon" href="<?= base_url(); ?>/template/assets/img/logo-icon.png">

    <!-- Google Fonts and Datatable -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <link href="<?= base_url(); ?>/template/assets/vendor/simple-datatables/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/template/assets/vendor/simple-datatables/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/template/assets/vendor/simple-datatables/responsive.bootstrap5.min.css" rel="stylesheet">



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

<body>

    <!-- Header -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="<?= site_url('/'); ?>" class="logo d-flex align-items-center">
                <img src="<?= base_url(); ?>/template/assets/img/logo-icon.png" style="max-height: 35px;" alt="">
                <span class="d-none d-lg-block">Nusamitek</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="<?= base_url(''); ?>/template/assets/img/messages-3.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= user()->username ?></span>
                    </a><!-- End Profile Image Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?= user()->username ?></h6>
                            <span></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?= site_url('logout'); ?>">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Keluar</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item ">
                <a class="nav-link <?= $menu == 'dashboard' ? '' : 'collapsed'; ?>" href="<?= site_url('/') ?>">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-heading">Master Data</li>
            <li class="nav-item ">
                <a class="nav-link <?= $menu == 'inventaris' ? '' : 'collapsed'; ?>" href="<?= site_url('inventaris') ?>">
                    <i class="bi bi-box-seam-fill"></i>
                    <span>Inventaris</span>
                </a>
            </li>

            <!-- Assets -->
            <li class="nav-item ">
                <a class="nav-link  <?= $menu == 'asset' ? '' : 'collapsed'; ?>" data-bs-target="#product" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-database-fill"></i><span>Asset</span><i class="bi bi-chevron-down ms-auto "></i>
                </a>
                <ul id="product" class="nav-content <?= $menu == 'asset' ? '' : 'collapse'; ?> " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?= site_url('assets/barang'); ?>" class="<?= $submenu == 'barang' ? 'active' : ''; ?>">
                            <i class="bi bi-circle"></i><span>Barang</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('assets/lokasi'); ?>" class="<?= $submenu == 'lokasi' ? 'active' : ''; ?>">
                            <i class="bi bi-circle"></i><span>Lokasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('assets/kategori'); ?>" class="<?= $submenu == 'kategori' ? 'active' : ''; ?>">
                            <i class="bi bi-circle"></i><span>Kategori</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Assets -->

            <?php if (in_groups('admin')) : ?>
                <!-- Transaction -->
                <li class="nav-heading">Transaksi</li>
                <li class="nav-item ">
                    <a class="nav-link  <?= $menu == 'transaksi' ? '' : 'collapsed'; ?>" data-bs-target="#transaksi" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-cart4"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto "></i>
                    </a>
                    <ul id="transaksi" class="nav-content <?= $menu == 'transaksi' ? '' : 'collapse'; ?> " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="<?= site_url('transaksi/pembelian'); ?>" class="<?= $submenu == 'pembelian' ? 'active' : ''; ?>">
                                <i class="bi bi-circle"></i><span>Pembelian</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('transaksi/pengeluaran'); ?>" class="<?= $submenu == 'pengeluaran' ? 'active' : ''; ?>">
                                <i class="bi bi-circle"></i><span>Pengeluaran</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Transaction -->
            <?php endif; ?>

            <!-- line horizontal -->
            <hr style="color:#A4A6B3">
            <!-- End Line Horizontal -->

            <!-- Report -->
            <div class="transaparansi">
                <li class="nav-item ">
                    <a class="nav-link <?= $menu == 'laporan' ? '' : 'collapsed'; ?>" href="<?= site_url('laporan') ?>">
                        <i class="bi bi-clipboard-fill"></i>
                        <span>Laporan</span>
                    </a>
                </li>
            </div>
            <!-- End Report -->
            <?php if (in_groups('admin')) : ?>
                <li class="nav-item">
                    <a class="nav-link <?= $menu == 'profil' ? '' : 'collapsed'; ?>" data-bs-target="#profile" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-people-fill"></i><span>Profile</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="profile" class="nav-content <?= $menu == 'profil' ? '' : 'collapse'; ?> " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="<?= site_url('karyawan'); ?>" class="<?= $submenu == 'karyawan' ? 'active' : ''; ?>">
                                <i class="bi bi-circle"></i><span>Karyawan</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
    </aside>
    <!-- End Sidebar -->

    <main id="main" class="main">
        <?= $this->renderSection('content'); ?>
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer mt-2">
        <div class=" copyright">
            &copy; Copyright <strong><span>2023. PT Nusamitek Putra Jaya</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->

    <!-- Button Top Back -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style="background-color: black;"><i class="bi bi-arrow-up-short"></i></a>








    <script src="<?= base_url(); ?>/template/assets/vendor/simple-datatables/jquery-3.5.1.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/simple-datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/simple-datatables/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/simple-datatables/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/simple-datatables/responsive.bootstrap5.min.js"></script>



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

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                responsive: true,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#datatable-2').DataTable({
                responsive: true,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#datatable-3').DataTable({
                responsive: true,
            });
        });
    </script>
</body>

</html>