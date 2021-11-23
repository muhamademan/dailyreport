<div class="container-fluid">
    <div class="col-lg">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <div class="main-body shadow">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-0">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="Admin"
                                class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4><?= $user['nama']; ?></h4>
                                <p class="text-secondary mb-1"><?= $DataUser['role']; ?></p>
                                <p class="card-text mt-4 mb-3"><a href="<?= base_url('pengaturan/gantiPassword') ?>"
                                        class="badge badge-dark"><i class="fa fa-lock text-light mx-1"></i>Ganti
                                        Password</a></p>
                                <a href="<?= base_url('pengaturan/ubahProfile'); ?>"
                                    class="btn btn-primary mb-0 shadow">Edit
                                    Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">NIK</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $user['nik']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nama Lengkap</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $user['nama']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Tanggal Lahir</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $user['tgl_lahir']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $user['email']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Jenis Kelamin</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $user['jenis_kelamin']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Wewenang</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $DataUser['role']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Status</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php if ($user['status'] == 1) : ?>
                                <div class="badge badge-success">Aktif</div>
                                <?php elseif ($user['status'] != 1) : ?>
                                <div class="badge badge-danger">Tidak Aktif</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>