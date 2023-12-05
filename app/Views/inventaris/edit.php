<?= $this->extend('layouts/v_master'); ?>

<?= $this->section('content'); ?>
<section class="section">

    <div class="pagetitle">
        <h1>Inventaris</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= site_url('procurement'); ?>"> Inventaris</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="row justify-content-center">
        <div class="col-lg-12 mt-2">
            <div class="card border-top border-primary border-5">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold; font-size: 20px;">
                        <a href="<?= site_url('inventaris') ?>" style="color: black;" class=" bi bi-arrow-left-circle-fill d-inline" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Kembali"></a>
                        Edit Inventaris
                    </h5>
                    <!-- General Form Elements -->
                    <?php foreach ($inventaris as $p) : ?>
                        <form action="<?= site_url('inventaris/update/' . $p->id_inventaris) ?>" class="needs-validation row g-3 pt-4" method="post" enctype="multipart/form-data" accept-charset="utf-8" novalidate>
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row col-sm-6 mb-3 position-relative">
                                <label for="tanggal" class="col-sm-4 col-form-label">Tanggal </label>
                                <div class="col-sm-8">
                                    <input type="date" name="tanggal" value="<?= (old('tanggal')) ? old('tanggal') : $p->tanggal; ?>" class="form-control <?= $error = validation_Errors('tanggal') ? 'is-invalid' : ''; ?>" required>
                                    <div class="invalid-tooltip">
                                        <?= validation_show_error('tanggal'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-sm-6 mb-3 position-relative">
                                <label for="stok" class="col-sm-4 col-form-label">Stok</label>
                                <div class="col-sm-8">
                                    <input type="number" name="stok" value="<?= (old('stok')) ? old('stok') : $p->stok; ?>" class="form-control <?= $error = validation_Errors('stok') ? 'is-invalid' : ''; ?>" required>
                                    <div class="invalid-tooltip">
                                        <?= validation_show_error('stok'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-sm-6 mb-3 position-relative">
                                <label for="nama_barang_id" class="col-sm-4 col-form-label">Nama Barang</label>
                                <div class="col-sm-8">
                                    <select name="nama_barang_id" class="form-select " aria-label="Default select example">
                                        <?php foreach ($barang as $b) : ?>
                                            <option value="<?= $b->id_barang; ?>" <?= ($b->id_barang == $p->nama_barang_id) ? 'selected' : null; ?>>
                                                <?= $b->nama_barang; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="row col-sm-6 mb-3 position-relative">
                                <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                                <div class="col-sm-8">
                                    <input type="number" name="harga" value="<?= (old('harga')) ? old('harga') : $p->harga; ?>" class="form-control <?= $error = validation_Errors('harga') ? 'is-invalid' : ''; ?>" required>
                                    <div class="invalid-tooltip">
                                        <?= validation_show_error('harga'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-sm-6 mb-3 position-relative">
                                <label for="kategori_barang_id" class="col-sm-4 col-form-label">Kategori</label>
                                <div class="col-sm-8">
                                    <select name="kategori_barang_id" class="form-select " aria-label="Default select example">
                                        <?php foreach ($kategori as $k) : ?>
                                            <option value=" <?= $k->id_kategori; ?>" <?= ($k->id_kategori == $k->nama_kategori) ? 'selected' : null; ?>>
                                                <?= $k->nama_kategori; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row col-sm-6 mb-3 position-relative">
                                <label for="lokasi_barang_id" class="col-sm-4 col-form-label">Kategori</label>
                                <div class="col-sm-8">
                                    <select name="lokasi_barang_id" class="form-select " aria-label="Default select example">
                                        <?php foreach ($lokasi as $k) : ?>
                                            <option value=" <?= $k->id_lokasi; ?>" <?= ($k->id_lokasi == $k->nama_lokasi) ? 'selected' : null; ?>>
                                                <?= $k->nama_lokasi; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary bi bi-cursor-fill">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('content'); ?>