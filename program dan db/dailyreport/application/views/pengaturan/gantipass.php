<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="row">
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
            <!-- bagian form ganti password -->
            <div class="card shadow">
                <div class="card-body">
                    <form action="<?= base_url('pengaturan/gantiPassword') ?>" method="post">
                        <div class="form-group">
                            <label for="currentPassword">Password Lama</label>
                            <input type="password" class="form-control" id="currentPassword" name="currentPassword">
                            <?= form_error('currentPassword', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="newPassword1">Password Baru</label>
                            <input type="password" class="form-control" id="newPassword1" name="newPassword1">
                            <?= form_error('newPassword1', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="newPassword2">Ulangi Password Baru</label>
                            <input type="password" class="form-control" id="newPassword2" name="newPassword2">
                            <?= form_error('newPassword2', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Ganti Password</button>
                            <a href="<?= base_url('pengaturan'); ?>" class="btn btn-secondary">Kembali</a>
                        </div>

                    </form>
                </div>
            </div>
            <!-- akhir form ganti password -->
        </div>
    </div>
</div>
</div>