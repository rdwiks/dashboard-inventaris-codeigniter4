<?= $this->extend('layouts/v_master'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <!-- breadcrumb -->
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"></a>Home</li>
                <li class="breadcrumb-item active" aria-current="page">Karyawan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Alert Success -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="col-sm-5 ">
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill mx-2" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                <strong class=""> <?= session()->getFlashdata('pesan'); ?></strong>
                <button type="button" class="btn bi bi-x-circle-fill" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>
    <!-- End Alert -->

    <!-- Alert Delete -->
    <?php if (session()->getFlashdata('hapus')) : ?>
        <div class="col-sm-5">
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill mx-2" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                <strong><?= session()->getFlashdata('hapus'); ?></strong>
                <button type="button" class="btn bi bi-x-circle-fill" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>
    <!-- End Alert -->

    <div class="col-12 mt-4">
        <div class="card recent-sales overflow-auto border-top border-primary border-5">
            <div class="card-body">
                <h5 class="card-title" style="font-weight: bold; font-size: 20px;">Daftar Karyawan</h5>

                <nav class="navbar navbar-expand-lg mb-2">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <div class="nav-kategori">

                                <?php if (in_groups('admin')) : ?>
                                    <a href="<?= site_url('karyawan/create') ?>" class="btn btn-sm btn-dark "><span class="bi bi-plus-circle"> Tambah</span></a>
                                <?php endif; ?>
                                <!-- Pdf Export -->
                                <a href="<?= site_url('karyawan/exportKaryawan') ?>" class="btn btn-sm btn-success d-inline"><span class="bi bi-file-earmark-pdf-fill"> EXCEL</span></a>
                                <!-- End Pdf Export -->
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="table-responsive-sm">
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%; font-size:12px">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nip</th>
                                <th scope="col">KTP</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Pendidikan</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Telepon</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Status</th>
                                <th scope="col">Email</th>
                                <?php if (in_groups('admin')) : ?>
                                    <th scope="col" class="col-sm-1"><span class="bi bi-gear"></span></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($karyawan as $p) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $p['nip']; ?></td>
                                    <td><?= $p['no_ktp']; ?></td>
                                    <td><?= $p['nama']; ?></td>
                                    <td><?= $p['alamat']; ?></td>
                                    <td><?= $p['tanggal_lahir']; ?></td>
                                    <td><?= $p['tempat_lahir']; ?></td>
                                    <td><span class="badge text-bg-warning"><?= $p['pendidikan']; ?></span></td>
                                    <td><?= $p['agama']; ?></td>
                                    <td><span class="badge text-bg-warning"><?= $p['no_telepon']; ?></td>
                                    <td><?= $p['jenis_kelamin']; ?></td>
                                    <td><?= $p['status']; ?></td>
                                    <td><span class="badge text-bg-warning"><?= $p['email']; ?></td>
                                    <?php if (in_groups('admin')) : ?>
                                        <td>
                                            <a href="<?= site_url('karyawan/edit/' . $p['slug']) ?>" class="btn btn-success btn-sm bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"></a>
                                            <form action="<?= site_url('karyawan/delete/' . $p['id_karyawan']) ?>" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-sm bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hapus"></button>
                                            </form>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('content'); ?>