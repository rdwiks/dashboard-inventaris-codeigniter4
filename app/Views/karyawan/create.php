<?= $this->extend('layouts/v_master'); ?>

<?= $this->section('content'); ?>

<div class="pagetitle">
    <h1>Profile</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= site_url('engineering'); ?>"> Karyawan</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="<?= site_url('karyawan') ?>" style="color: black;" class=" bi bi-arrow-left-circle-fill d-inline" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Kembali"></a>
                        Tambah Karyawan
                    </h5>
                    <!-- General Form Elements -->
                    <form action="<?= site_url('karyawan/save'); ?>" class="row g-3 pt-4" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                        <?= csrf_field() ?>
                        <div class="row col-sm-6 mb-3">
                            <label for="nip" class="col-sm-4 col-form-label">NIP</label>
                            <div class="col-sm-8">
                                <input type="number" id="nip" name="nip" value="<?= old('nip'); ?>" class="form-control <?= $error = validation_Errors('nip') ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback" style="font-size: 11px; letter-spacing: 2.4px;">
                                    <?= validation_show_error('nip'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row col-sm-6 mb-3">
                            <label for="no_ktp" class="col-sm-4 col-form-label">No.Ktp</label>
                            <div class="col-sm-8 ">
                                <input type="number" id="no_ktp" name="no_ktp" value="<?= old('no_ktp'); ?>" class="form-control <?= $error = validation_Errors('no_ktp') ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback" style="font-size: 11px; letter-spacing: 2.4px;">
                                    <?= validation_show_error('no_ktp'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row col-sm-6 mb-3">
                            <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama" value="<?= old('nama'); ?>" class="form-control <?= $error = validation_Errors('nama') ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback" style="font-size: 11px; letter-spacing: 2.4px;">
                                    <?= validation_show_error('nama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row col-sm-6 mb-3">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" name="email" value="<?= old('email'); ?>" class="form-control <?= $error = validation_Errors('email') ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback" style="font-size: 11px; letter-spacing: 2.4px;">
                                    <?= validation_show_error('email'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row col-sm-6 mb-3">
                            <label for="tanggal_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-8">
                                <input type="date" name="tanggal_lahir" value="<?= old('tanggal_lahir'); ?>" class="form-control <?= $error = validation_Errors('tanggal_lahir') ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback" style="font-size: 11px; letter-spacing: 2.4px;">
                                    <?= validation_show_error('tanggal_lahir'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row col-sm-6 mb-3">
                            <label for="agama" class="col-sm-4 col-form-label">Agama</label>
                            <div class="col-sm-8">
                                <input type="text" name="agama" value="<?= old('agama'); ?>" class="form-control <?= $error = validation_Errors('agama') ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback" style="font-size: 11px; letter-spacing: 2.4px;">
                                    <?= validation_show_error('agama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row col-sm-6 mb-3">
                            <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" name="tempat_lahir" value="<?= old('tempat_lahir'); ?>" class="form-control <?= $error = validation_Errors('tempat_lahir') ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback" style="font-size: 11px; letter-spacing: 2.4px;">
                                    <?= validation_show_error('tempat_lahir'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row col-sm-6 mb-3">
                            <label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <input type="text" name="jenis_kelamin" value="<?= old('jenis_kelamin'); ?>" class="form-control <?= $error = validation_Errors('jenis_kelamin') ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback" style="font-size: 11px; letter-spacing: 2.4px;">
                                    <?= validation_show_error('jenis_kelamin'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row col-sm-6 mb-3">
                            <label for="no_telepon" class="col-sm-4 col-form-label">Telepon</label>
                            <div class="col-sm-8">
                                <input type="text" name="no_telepon" value="<?= old('no_telepon'); ?>" class="form-control text-uppercase <?= $error = validation_Errors('no_telepon') ? 'is-invalid' : ' valid'; ?>">
                                <div class="invalid-feedback" style="font-size: 11px; letter-spacing: 2.4px;">
                                    <?= validation_show_error('no_telepon'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row col-sm-6 mb-3">
                            <label for="status" class="col-sm-4 col-form-label">status</label>
                            <div class="col-sm-8">
                                <input type="text" name="status" value="<?= old('status'); ?>" class="form-control <?= $error = validation_Errors('status') ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback" style="font-size: 11px; letter-spacing: 2.4px;">
                                    <?= validation_show_error('status'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row col-sm-6 mb-3">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <textarea type="text" name="alamat" value="<?= old('alamat'); ?>" class="form-control <?= $error = validation_Errors('alamat') ? 'is-invalid' : ''; ?>"></textarea>
                                <div class="invalid-feedback" style="font-size: 11px; letter-spacing: 2.4px;">
                                    <?= validation_show_error('alamat'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row col-sm-6 mb-3">
                            <label for="pendidikan" class="col-sm-4 col-form-label">Pendidikan</label>
                            <div class="col-sm-8">
                                <input type="text" name="pendidikan" value="<?= old('pendidikan'); ?>" class="form-control <?= $error = validation_Errors('pendidikan') ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback" style="font-size: 11px; letter-spacing: 2.4px;">
                                    <?= validation_show_error('pendidikan'); ?>
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