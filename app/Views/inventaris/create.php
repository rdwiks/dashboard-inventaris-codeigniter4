<?= $this->extend('layouts/v_master'); ?>

<?= $this->section('content'); ?>
<section class="section">

    <div class="pagetitle">
        <h1>Inventaris</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= site_url('inventaris'); ?>"> Inventaris</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="row justify-content-center">
        <div class="col-lg-12 mt-2">
            <div class="card border-top border-primary border-5">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold; font-size: 20px;">
                        <a href="<?= site_url('inventaris') ?>" style="color: black;" class=" bi bi-arrow-left-circle-fill d-inline" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Kembali"></a>
                        Tambah Inventaris
                    </h5>

                    <!-- General Form Elements -->
                    <form action="<?= site_url('inventaris/save'); ?>" class="row g-3 pt-4" method="post" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off">
                        <?= csrf_field() ?>
                        <div class="row col-sm-6 mb-3 ">
                            <label for="tanggal" class="col-sm-4 col-form-label">Tanggal </label>
                            <div class="col-sm-8">
                                <input type="date" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>" class=" form-control <?= ($error = validation_errors('tanggal')) ? 'is-invalid' : '' ?>">
                                <div class="invalid-feedback" style="font-size: 11px; letter-spacing: 2.4px;">
                                    <?= validation_show_error('tanggal'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row col-sm-6 mb-3 ">
                            <label for="stok" class="col-sm-4 col-form-label">stok </label>
                            <div class="col-sm-8">
                                <input type="number" id="stok" name="stok" value="<?= old('stok'); ?>" class=" form-control <?= $error = validation_errors('stok') ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback" style="font-size: 11px; letter-spacing: 2.4px;">
                                    <?= validation_show_error('stok'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row col-sm-6 mb-3 ">
                            <label for="nama_barang_id" class="col-sm-4 col-form-label">Nama Barang</label>
                            <div class="col-sm-8">
                                <select name="nama_barang_id" id="nama_barang_id" class=" form-select <?= $error = validation_errors('nama_barang_id') ? 'is-invalid' : ''; ?>">
                                    <option value="hidden"></option>
                                    <?php foreach ($barang as $p) : ?>
                                        <option value="<?= $p->id_barang; ?>" <?= old('id_barang') ==  $p->id_barang ? 'selected' : ''; ?>><?= $p->nama_barang; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback" style="font-size: 11px; letter-spacing: 2.4px;">
                                    <?= validation_show_error('nama_barang_id'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row col-sm-6 mb-3 ">
                            <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                            <div class="col-sm-8">
                                <input type="number" id="harga" name="harga" value="<?= old('harga'); ?>" class=" form-control <?= $error = validation_errors('harga') ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback" style="font-size: 11px; letter-spacing: 2.4px;">
                                    <?= validation_show_error('harga'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row col-sm-6 mb-3 ">
                            <label for="kategori_barang_id" class="col-sm-4 col-form-label">Kategori Barang</label>
                            <div class="col-sm-8">
                                <select name="kategori_barang_id" id="kategori_barang_id" class=" form-select <?= $error = validation_Errors('kategori_barang_id') ? 'is-invalid' : ''; ?>" required>
                                    <option value="hidden"></option>
                                    <?php foreach ($kategori as $p) : ?>
                                        <option value="<?= old('id_kategori'), $p->id_kategori ?>"><?= old('kode_kategori'), $p->kode_kategori; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback" style="font-size: 11px; letter-spacing: 2.4px;">
                                    <?= validation_show_error('kategori'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row col-sm-6 mb-3 ">
                            <label for="lokasi_barang_id" class="col-sm-4 col-form-label">Lokasi Barang</label>
                            <div class="col-sm-8">
                                <select name="lokasi_barang_id" id="lokasi_barang_id" class=" form-select <?= $error = validation_Errors('lokasi_barang_id') ? 'is-invalid' : ''; ?>" required>
                                    <option value="hidden"></option>
                                    <?php foreach ($lokasi as $p) : ?>
                                        <option value="<?= old('id_lokasi'), $p->id_lokasi; ?>"><?= $p->kode_lokasi; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback" style="font-size: 11px; letter-spacing: 2.4px;">
                                    <?= validation_show_error('lokasi'); ?>
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