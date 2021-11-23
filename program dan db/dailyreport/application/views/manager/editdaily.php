<div class="container-fluid">
    <div class="col-md-9 mx-auto">
        <div class="card shadow">
            <div class="card-header bg-primary border-bottom-warning">
                <span class="text-light">Edit Daily Report</span>
            </div>
            <div class="card-body">
                <form action="<?= base_url('manager/proseseditDaily/') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $ubah_daily['id']; ?>">
                    <div class="form-group">
                        <label for="NamaKelas">Tanggal Kegiatan</label>
                        <input name="tgl_kegiatan" type="date" class="form-control" id="NamaKelas"
                            value="<?= $ubah_daily['tgl_kegiatan']; ?>">
                    </div>
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
                    <label for="#">Status</label>
                    <select class="text-left form-control mb-3" name="status" required
                        style="padding-right: 100px; width: 100%;">
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="1">Pending</option>
                        <option value="2">Diterima</option>
                        <option value="3">Ditolak</option>
                    </select>
                    <div class="form-group">
                        <label for="NamaKelas">Nama Verifikator</label>
                        <input name="verifikator" type="text" class="form-control" id="NamaKelas"
                            value="<?= $ubah_daily['verifikator']; ?>">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary py-0">Simpan</button>
                        <a href="<?= base_url('manager/daily') ?>" class="btn btn-secondary py-0">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>