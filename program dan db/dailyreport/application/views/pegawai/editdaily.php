<div class="container-fluid">
    <div class="col-md-9 mx-auto">
        <div class="card shadow">
            <div class="card-header bg-primary border-bottom-warning">
                <span class="text-light">Edit Daily Report</span>
            </div>
            <div class="card-body">
                <form action="<?= base_url('pegawai/proseseditDaily/') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $ubah_daily['id']; ?>">
                    <div class="form-group">
                        <label for="NamaKelas">Tanggal Kegiatan</label>
                        <input name="tgl_kegiatan" type="date" class="form-control" id="NamaKelas"
                            value="<?= $ubah_daily['tgl_kegiatan']; ?>">
                    </div>
                    <!-- <div class="form-group">
                        <label for="Kelas">Kelas</label>
                        <select class="form-control" name="id_kelas" id="Kelas" required>
                            <option value="" selected disabled>--Pilih Kelas--</option>
                            <?php foreach ($ubah_kelas as $uh) : ?>
                            <option value="<?= $uh['id_kelas']; ?>"><?= $uh['nama_kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label for="NamaKelas">Nama Kegiatan</label>
                        <input name="kegiatan" type="text" class="form-control" id="NamaKelas"
                            value="<?= $ubah_daily['kegiatan']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="NamaKelas">Waktu Mulai</label>
                        <input name="waktu_mulai" type="time" class="form-control" id="NamaKelas"
                            value="<?= $ubah_daily['waktu_mulai']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="NamaKelas">Waktu Selesai</label>
                        <input name="waktu_selesai" type="time" class="form-control" id="NamaKelas"
                            value="<?= $ubah_daily['waktu_selesai']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="NamaKelas">Durasi</label>
                        <input name="durasi" type="time" class="form-control" id="NamaKelas"
                            value="<?= $ubah_daily['durasi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="NamaKelas">Hasil pengerjaan</label>
                        <input name="output" type="text" class="form-control" id="NamaKelas"
                            value="<?= $ubah_daily['output']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="NamaKelas">Status</label>
                        <?php if ($ubah_daily['status'] == 1) : ?>
                        <td class="py-1 align-middle text-center"><span
                                class="badge bg-warning text-white">Pending</span></td>
                        <?php elseif ($ubah_daily['status'] == 2) : ?>
                        <td class="py-1 align-middle text-center"><span
                                class="badge bg-success text-white">Diterima</span></td>
                        <?php else : ?>
                        <td class="py-1 align-middle text-center"><span
                                class="badge bg-danger text-white">Ditolak</span></td>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="NamaKelas">Nama Verifikator</label>
                        <input name="verifikator" type="text" class="form-control" id="NamaKelas"
                            value="<?= $ubah_daily['verifikator']; ?>" readonly>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary py-0">Simpan</button>
                        <a href="<?= base_url('pegawai/dailyreport') ?>" class="btn btn-secondary py-0">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>