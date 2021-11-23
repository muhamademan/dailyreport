<div class="container-fluid">
    <div class="col-lg">

        <!-- Filter daily report -->
        <section class="page-section services card-group" id="services">
            <div class="col-lg-4 col-md-6 text-center">
                <div class="">
                    <div class="card shadow card-2 card2">
                        <div class="card-header bg-primary border-bottom-warning py-3">
                            <div class="row">
                                <div class="col">
                                    <span class="text-light"></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <img src="assets/img/superspeed.png" alt="" width="70px"> -->
                            <h3 class="h4">FILTER BY TANGGAL</h3>
                            <form action="<?= base_url('pegawai/filter'); ?>" method="POST">
                                <input type="hidden" name="nilai_filter" value="1">
                                <label for="">Tanggal Awal</label>
                                <input type="date" name="tanggalawal" class="form-control" required>
                                <label for="">Tanggal Akhir</label>
                                <input type="date" name="tanggalakhir" class="form-control" required>
                                <input type="submit" value="Cari" class="mt-2 btn btn-primary py-0">
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6 text-center mb-4">
                <div class="">
                    <div class="card shadow card-2 card2">
                        <div class="card-header bg-primary border-bottom-warning py-3">
                            <div class="row">
                                <div class="col">
                                    <span class="text-light"></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <img src="assets/img/superspeed.png" alt="" width="70px"> -->
                            <h3 class="h4">FILTER BY BULAN</h3>
                            <form action="<?= base_url('pegawai/filter'); ?>" method="POST">
                                <input type="hidden" name="nilai_filter" value="2">
                                Pilih Tahun <br>
                                <select name="tahun1" required class="form-control">
                                    <option value="" selected disabled>Pilih Tahun</option>
                                    <?php foreach ($tahun as $n) : ?>
                                    <option value="<?= $n->tahun; ?>"><?= $n->tahun; ?></option>
                                    <?php endforeach; ?>
                                </select>

                                Bulan Awal
                                <select name="bulanawal" required class="form-control">
                                    <option value="" selected disabled>Pilih Bulan</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>

                                Bulan Akhir
                                <select name="bulanakhir" required class="form-control">
                                    <option value="" selected disabled>Pilih Bulan</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                                <input type="submit" value="Cari" class="mt-2 btn btn-primary py-0">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 text-center">
                <div class="">
                    <div class="card shadow card-2 card2">
                        <div class="card-header bg-primary border-bottom-warning py-3">
                            <div class="row">
                                <div class="col">
                                    <span class="text-light"></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <img src="assets/img/superspeed.png" alt="" width="70px"> -->
                            <h3 class="h4">FILTER BY TAHUN</h3>
                            <form action="<?= base_url('pegawai/filter'); ?>" method="POST">
                                <input type="hidden" name="nilai_filter" value="3">
                                <label for="">Pilih Tahun</label>
                                <select name="tahun2" class="form-control" required>
                                    <option value="" selected disabled>Pilih Tahun</option>
                                    <?php foreach ($tahun as $n) : ?>
                                    <option value="<?= $n->tahun; ?>"><?= $n->tahun; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="submit" value="Cari" class="mt-2 mb-5 btn btn-primary py-0">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End filter daily report -->

        <!-- Notifikasi message validasi -->
        <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
        <?php endif; ?>
        <?= $this->session->flashdata('message'); ?>
        <!-- end notifikasi -->

        <!-- Form Daily Report -->
        <div class="card shadow">
            <div class="card-header bg-primary border-bottom-warning py-2">
                <div class="row">
                    <div class="col">
                        <span class="text-light"></span>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-success py-0" data-toggle="modal" data-target="#new">Tambah</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($nik as $dp) : ?>
                            <tr class="text-center">
                                <td class="py-0 align-middle"><?= $no++; ?></td>
                                <td class="py-1 align-middle text-center"><?= $dp['tgl_kegiatan']; ?></td>
                                <?php if ($dp['status'] == 1) : ?>
                                <td class="py-1 align-middle text-center"><span
                                        class="badge bg-warning text-white">Pending</span></td>
                                <?php elseif ($dp['status'] == 2) : ?>
                                <td class="py-1 align-middle text-center"><span
                                        class="badge bg-success text-white">Diterima</span></td>
                                <?php else : ?>
                                <td class="py-1 align-middle text-center"><span
                                        class="badge bg-danger text-white">Ditolak</span></td>
                                <?php endif; ?>

                                <!-- Action -->
                                <td class="py-1 align-middle text-center" width="10%">

                                    <a href="<?= base_url('pegawai/detaildaily/') . $dp['id']; ?>"><span
                                            class="bg-warning rounded py-1 pl-1 pr-0"><i
                                                class="fa fa-th-list text-light mx-1"></i></span></a>

                                    <a href="<?= base_url('pegawai/editDaily/') . $dp['id']; ?>"><span
                                            class="bg-success rounded py-1 pl-1 pr-0"><i
                                                class="fa fa-edit text-light mx-1"></i></span></a>

                                    <!-- Action Hapus daily report -->
                                    <a href="<?= base_url('pegawai/hapusdaily/') . $dp['id']; ?>"
                                        class="tombol-delete-user" data-toggle="modal"
                                        data-target="#hapusDaily<?= $dp['id'] ?>"><span class="bg-danger rounded p-1"><i
                                                class="fa fa-trash text-light mx-1"></i></span></a>

                                    <!-- modal hapus daily report -->
                                    <div class="modal fade" id="hapusDaily<?= $dp['id'] ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="hapusSiswaLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title font-weight-bold" id="hapusSiswaLabel">
                                                        Hapus Daily Report
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body"> Apakah anda yakin ingin menghapus daily report
                                                    ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="<?= base_url('pegawai/hapusdaily/') . $dp['id']; ?>"
                                                        class="btn btn-primary">Hapus</a>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Form Daily Report -->
    </div>
</div>
</div>

<!-- Modal Tambah daily report -->
<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Daily Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pegawai/dailyreport'); ?>" method="post">
                    <div class="form-group">
                        <label for="exampleInputUsername" class="font-weight-bold">Tanggal Kegiatan*</label>
                        <input type="date" name="tgl_kegiatan" class="form-control" id="exampleInputUsername"
                            placeholder="Tanggal Kegiatan" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername" class="font-weight-bold">Kegiatan*</label>
                        <input type="text" name="kegiatan" class="form-control" id="exampleInputUsername"
                            placeholder="Nama Kegiatan" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail" class="font-weight-bold">Waktu Mulai*</label>
                        <input type="time" name="waktu_mulai" class="form-control" id="exampleInputEmail"
                            placeholder="Waktu mulai" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail" class="font-weight-bold">Waktu selesai*</label>
                        <input type="time" name="waktu_selesai" class="form-control" id="exampleInputEmail"
                            placeholder="Masukan Waktu selesai" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail" class="font-weight-bold">Durasi*</label>
                        <input type="time" name="durasi" class="form-control" id="exampleInputEmail"
                            placeholder="Durasi Pengerjaan" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail" class="font-weight-bold">Hasil*</label>
                        <input type="text" name="output" class="form-control" id="exampleInputEmail"
                            placeholder="Hasil Pengerjaan" required>
                    </div>
                    <input type="hidden" name="id_user" class="form-control" id="exampleInputEmail"
                        value="<?= $user['id']; ?>">
            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Form Tambah Daily Report -->