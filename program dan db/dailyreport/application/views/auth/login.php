<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="mb-2 text-center">
                                    <tr>
                                        <td>
                                            <a href="<?= base_url(''); ?>" class="btn">
                                                <img src="assets/img/jne.png" alt="" width="90px">
                                                <h3 class="text-base text-dark text-uppercase mt-3 font-weight-bold">
                                                    Daily Report</h3>
                                            </a>
                                        </td>
                                    </tr>
                                </div>

                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="POST" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control border-3 shadow form-control-user text-primary font-weight-bold"
                                            id="nik" name="nik" placeholder="Masukan NIK"
                                            value="<?= set_value('nik'); ?>">
                                        <?= form_error('nik', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password"
                                            class="form-control border-3 shadow form-control-user text-primary font-weight-bold"
                                            id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block font-weight-bold">
                                        LOGIN
                                    </button>
                                </form>
                                <hr>
                                <div class="text-dark text-center mt-2"> Belum Punya Akun? <a
                                        href="<?= base_url('registrasi') ?>"
                                        class="text-primary font-weight-bold">Daftar</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>