<?= $this->extend('layouts/v_master'); ?>

<?= $this->section('content'); ?>
<section class="section">

    <div class="pagetitle">
        <h1>Transaksi Pengeluaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= site_url('transaksi/pengeluaran'); ?>"> Pengeluaran</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="row justify-content-center">
        <div class="col-lg-12 mt-2">
            <div class="card border-top border-primary border-5">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold; font-size: 20px;">
                        <a href="<?= site_url('transaksi/pengeluaran') ?>" style="color: black;" class=" bi bi-arrow-left-circle-fill d-inline" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Kembali"></a>
                        Tambah Transaksi
                    </h5>
                    <!-- General Form Elements -->
                    <form action="<?= site_url('transaksi/pengeluaran/save'); ?>" class="needs-validation row g-3 pt-4" method="post" enctype="multipart/form-data" accept-charset="utf-8" novalidate>
                        <?= csrf_field() ?>
                        <div class="row col-sm-6 mb-3 position-relative">
                            <label for="tanggal" class="col-sm-4 col-form-label">Tanggal </label>
                            <div class="col-sm-8">
                                <input type="date" name="tanggal" value="<?= old('tanggal'); ?>" class="form-control <?= $error = validation_Errors('tanggal') ? 'is-invalid' : ''; ?>" required>
                                <div class="invalid-tooltip">
                                    <?= validation_show_error('tanggal'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row col-sm-6 mb-3 position-relative">
                            <label for="keterangan" class="col-sm-4 col-form-label">Keterangan </label>
                            <div class="col-sm-8">
                                <input type="text" name="keterangan" value="<?= old('keterangan'); ?>" class="form-control <?= $error = validation_Errors('keterangan') ? 'is-invalid' : ''; ?>" required>
                                <div class="invalid-tooltip">
                                    <?= validation_show_error('keterangan'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row col-sm-6 mb-3 position-relative">
                            <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                            <div class="col-sm-8">
                                <input type="text" name="kategori" value="<?= old('kategori'); ?>" class="form-control <?= $error = validation_Errors('kategori') ? 'is-invalid' : ''; ?>" required>
                                <div class="invalid-tooltip">
                                    <?= validation_show_error('kategori'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row col-sm-6 mb-3 position-relative">
                            <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                            <div class="col-sm-8">
                                <input type="number" name="harga" value="<?= old('harga'); ?>" class="form-control <?= $error = validation_Errors('harga') ? 'is-invalid' : ''; ?>" required>
                                <div class="invalid-tooltip">
                                    <?= validation_show_error('harga'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary bi bi-cursor-fill">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('content'); ?>