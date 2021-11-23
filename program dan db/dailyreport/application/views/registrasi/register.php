<header class="musthead pb-5">
    <div class="container pb-5">
        <div class="row align-items-center justify-content-center text-center pb-5">
            <div class="col-md-8">
                <form id="msform" class="user" action="<?= base_url('registrasi/tambahAkun'); ?>" method="post">

                    <h2 class="text-light mb-3">Halaman Registrasi</h2>
                    <fieldset style="transform: scale(1);  opacity: 1; display: block;" class="tab">
                        <h2 class="fs-title " style="margin-bottom: 30px;">Data Pribadi</h2>
                        <input type="text" name="nama" class="form-control nama" placeholder="Nama Lengkap" required>
                        <input type="text" name="email" class="form-control" placeholder="Email" required>
                        <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required>
                        <select class="text-left form-control " name="jenis_kelamin" required
                            style="padding-right: 100px; width: 100%;">
                            <option value="" disabled selected>--Jenis Kelamin--</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <select class="text-left form-control mt-2" name="role_id"
                            style="padding-right: 100px; width: 100%;" required>
                            <option value="0" disabled selected>--Wewenang--</option>
                            <?php foreach ($role as $r) : ?>
                            <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="button" name="next" class="next action-button py-1 mt-4">Next</button>
                    </fieldset>
                    <fieldset class="tab">
                        <h2 class="fs-title">Buat Akun</h2>
                        <input type="text" name="nik" class="form-control" placeholder="Masukan NIK" required>
                        <input type="password" class="form-control" name="password" placeholder="Password" id="pw1">
                        <small class="Confirm-pw text-danger"></small>
                        <input type="password" class="form-control mb-0" oninput="ConfirmPW()" id="pw2" name="cpass"
                            placeholder="Confirm Password">
                        <button type="button" name="previous"
                            class="previous action-button-previous py-1 mt-4">Previous</button>
                        <button type="submit" class="submit action-button py-1 mt-4">Submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</header>