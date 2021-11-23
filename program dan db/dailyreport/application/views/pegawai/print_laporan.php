<div class="container-fluid">
    <div class="col-lg">
        <div class="card shadow">
            <div class="card-header bg-primary border-bottom-warning py-3">
                <div class="row">
                    <div class="col">
                        <span class="text-light"></span>
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
                            foreach ($datafilter as $dp) : ?>
                            <tr class="text-center">
                                <td class="py-0 align-middle"><?= $no++; ?></td>
                                <td class="py-1 align-middle text-center"><?= $dp->tgl_kegiatan; ?></td>
                                <?php if ($dp->status == 1) : ?>
                                <td class="py-1 align-middle text-center"><span
                                        class="badge bg-warning text-white">Pending</span></td>
                                <?php elseif ($dp->status == 2) : ?>
                                <td class="py-1 align-middle text-center"><span
                                        class="badge bg-success text-white">Diterima</span></td>
                                <?php else : ?>
                                <td class="py-1 align-middle text-center"><span
                                        class="badge bg-danger text-white">Ditolak</span></td>
                                <?php endif; ?>

                                <!-- Action detail daily report-->
                                <td class="py-1 align-middle text-center" width="10%">
                                    <a href="<?= base_url('pegawai/detaildaily/') . $dp->id; ?>"><span
                                            class="bg-warning rounded py-1 pl-1 pr-0"><i
                                                class="fa fa-th-list text-light mx-1"></i></span></a>
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