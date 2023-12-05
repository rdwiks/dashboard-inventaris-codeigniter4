<?= $this->extend('layouts/v_master'); ?>

<?= $this->section('content'); ?>

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12 mt-4">
            <div class="row">
                <!-- Stock Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card" id="st">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: bold;">Inventaris</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background: #DDEAFF;">
                                    <i class="bi bi-box-seam-fill" style="color: #8CB9FF;"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= countData('inventaris'); ?></h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Stock Card -->

                <!-- Product Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card revenue-card" id="tr">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: bold;">Barang </h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background: #ACECE2;">
                                    <i class="bi bi-database-fill" style="color:#04B096;"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= countData('master_barang'); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Product Card -->

                <!-- Location Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card revenue-card" id="tr">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: bold;">Lokasi </h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background:#FFF1CC; ">
                                    <i class="bi bi-geo-fill" style="color:#FFD056;"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 style=""><?= countData('lokasi_barang'); ?></h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Location Card -->

                <!-- Employed Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card revenue-card" id="ky">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: bold;">Karyawan</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background: #FFD8D8;">
                                    <i class="bi bi-people-fill" style="color:#FF7C7C"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= countData('karyawan'); ?></h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Employed Card -->

                <!-- Category Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card revenue-card" id="tr">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: bold;">Kategori </h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background: #BFC1F7;">
                                    <i class="bi bi-bookmark-fill" style="color:#292FE4;"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= countData('kategori_barang'); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Category Card -->

                <!-- Transaction Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card revenue-card" id="tr">

                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: bold;">Pembelian </h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background: #BEF2D1;">
                                    <i class="bi bi-cart4" style="color: #25D366;"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= countData('transaksi_barang'); ?></h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Transaction Card -->

                <!-- Expense Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card revenue-card" id="pg">

                        <div class="card-body">
                            <h5 class="card-title wrap" style="font-weight: bold;">Pengeluaran</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background: #7C7C7C;">
                                    <i class="bi bi-box-arrow-in-up-right" style="color:#000000"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= countData('transaksi_pengeluaran'); ?></h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Expense Card -->
            </div>
        </div>

        <!-- Table -->
        <div class="col-12 mt-4">
            <div class="card recent-sales overflow-auto border-top border-primary border-5">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold; font-size: 20px;">Rekapitulasi</h5>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body pt-3">
                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered" style="font-size:small;">

                                    <li class="nav-item">
                                        <button class="nav-link active bi bi-cart4" data-bs-toggle="tab" data-bs-target="#pembelian"> Pembelian</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link bi bi-box-arrow-in-up-right " data-bs-toggle="tab" data-bs-target="#pengeluaran"> Pengeluaran</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link bi bi-box-seam-fill " data-bs-toggle="tab" data-bs-target="#inventaris"> Inventaris</button>
                                    </li>
                                </ul>

                                <!-- Purchase -->
                                <div class="tab-content pt-2">
                                    <div class="tab-pane fade show active pembelian" id="pembelian">
                                        <div class="table-responsive-sm ">
                                            <nav class="navbar navbar-expand-lg mb-2">
                                                <div class="container-fluid">
                                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                                        <span class="navbar-toggler-icon"></span>
                                                    </button>
                                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                        <?php if (in_groups('admin')) : ?>
                                                            <div class="nav-kategori">
                                                                <!-- Pdf Export-->
                                                                <a href="<?= site_url('laporan/transaksi/exportPembelian') ?>" class="btn btn-sm btn-success d-inline"><span class="bi bi-file-earmark-pdf-fill"> EXCEL</span></a>
                                                                <!-- End Pdf Export -->
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </nav>
                                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="font-size:small; width:100%;">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th scope="col">No.</th>
                                                        <th scope="col">Kode Barang</th>
                                                        <th scope="col">Supplier</th>
                                                        <th scope="col">Tanggal</th>
                                                        <th scope="col">Nama Barang</th>
                                                        <th scope="col">Jumlah</th>
                                                        <th scope="col">Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($pembelian as $p) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $i++; ?></th>
                                                            <td style="background-color: #0EBAA0; color:white;"><?= $p->kode_barang; ?></td>
                                                            <td><?= $p->supplier; ?></td>
                                                            <td><?= $p->tanggal; ?></td>
                                                            <td><?= $p->nama_barang; ?></td>
                                                            <td><span class="badge " style="background-color: #0E7CBA; color:white;"><?= $p->jumlah; ?></span></td>
                                                            <td><span class="badge " style="background-color: #BA2D0E;"><?= $p->harga; ?></span></td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- End Purchase -->

                                    <!-- Expenditure Transactions -->
                                    <div class="tab-content pt-2">
                                        <div class="tab-pane fade  pengeluaran" id="pengeluaran">
                                            <div class="table-responsive-sm ">
                                                <nav class="navbar navbar-expand-lg mb-2">
                                                    <div class="container-fluid">
                                                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                                            <span class="navbar-toggler-icon"></span>
                                                        </button>
                                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                            <?php if (in_groups('admin')) : ?>
                                                                <div class="nav-kategori">
                                                                    <!-- Pdf Export-->
                                                                    <a href="<?= site_url('laporan/transaksi/exportPengeluaran') ?>" class="btn btn-sm btn-success d-inline"><span class="bi bi-file-earmark-pdf-fill"> EXCEL</span></a>
                                                                    <!-- End Pdf Export -->
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </nav>
                                                <table id="datatable-3" class="table table-striped table-bordered dt-responsive nowrap" style="font-size:small; width:100%;">
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th scope="col">No.</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Keterangan</th>
                                                            <th scope="col">Kategori</th>
                                                            <th scope="col">Harga</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($pengeluaran as $u) : ?>
                                                            <tr>
                                                                <th scope="row"><?= $i++; ?></th>
                                                                <td><?= $u->tanggal; ?></td>
                                                                <td style="background-color: #0EBAA0; color:white;"><?= $u->keterangan; ?></td>
                                                                <td><?= $u->kategori; ?></td>
                                                                <td><span class="badge " style="background-color: #BA2D0E;"><?= $u->harga; ?></span></td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- End Expenditure Transactions -->

                                        <!-- Inventory -->
                                        <div class="tab-pane fade inventaris" id="inventaris">
                                            <div class="table-responsive-sm ">
                                                <nav class="navbar navbar-expand-lg mb-2">
                                                    <div class="container-fluid">
                                                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                                            <span class="navbar-toggler-icon"></span>
                                                        </button>
                                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                            <?php if (in_groups('admin')) : ?>
                                                                <div class="nav-kategori">
                                                                    <!-- Pdf Export -->
                                                                    <a href="<?= site_url('laporan/inventaris/exportInventaris') ?>" class="btn btn-sm btn-success d-inline"><span class="bi bi-file-earmark-pdf-fill"> EXCEL</span></a>
                                                                    <!-- End Pdf Export -->
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </nav>
                                                <table id="datatable-2" class="table table-striped table-bordered dt-responsive nowrap" style="font-size:small; width:100%;">
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th scope="col">No.</th>
                                                            <th scope="col">Kode Barang</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Nama Barang</th>
                                                            <th scope="col">Kategori </th>
                                                            <th scope="col">Lokasi </th>
                                                            <th scope="col">Stok</th>
                                                            <th scope="col">Harga</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($inventaris as $t) : ?>
                                                            <tr>
                                                                <th scope="row"><?= $i++; ?></th>
                                                                <td style="background-color: #0EBAA0; color:white;"><?= $t->kode_barang; ?></td>
                                                                <td><?= $t->tanggal; ?></td>
                                                                <td><?= $t->nama_barang; ?></td>
                                                                <td><?= $t->nama_kategori; ?></td>
                                                                <td><span class="badge text-bg-<?= ($t->nama_lokasi == 'Gudang') ? 'warning' : 'dark'; ?>"><?= $t->nama_lokasi; ?></span></td>
                                                                <td><span class=" badge text-bg" style="background-color: #0E7CBA; color:white;"><?= $t->stok; ?></span></td>
                                                                <td><span class="badge " style="background-color: #BA2D0E;"><?= $t->harga; ?></span></td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- End Inventory -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('content'); ?>