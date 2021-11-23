<div class="card-body">
    <div class="card shadow mb-4 border-bottom-primary" id="infosiswa" value="0">
        <!-- Card Header - Accordion -->
        <a href="#informasidaily" class="d-block bg-primary border border-primary card-header py-3"
            data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-white">Detail Daily Report</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="informasidaily">
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <?php foreach ($dtdaily as $dd) { ?>
                        <tr>
                            <td>Tanggal Kegiatan</td>
                            <td>: <?php echo $dd->tgl_kegiatan ?></td>
                        </tr>
                        <tr>
                            <td>Nama Kegiatan</td>
                            <td>: <?php echo $dd->kegiatan ?></td>
                        </tr>
                        <tr>
                            <td>Waktu Mulai</td>
                            <td>: <span><?php echo $dd->waktu_mulai ?></span></td>
                        </tr>
                        <tr>
                            <td>Waktu Selesai</td>
                            <td>: <span><?php echo $dd->waktu_selesai ?></span></td>
                        </tr>
                        <tr>
                            <td>Durasi Kegiatan</td>
                            <td>: <?php echo $dd->durasi ?></td>
                        </tr>
                        <tr>
                            <td>Hasil Kegiatan</td>
                            <td>: <span><?php echo $dd->output ?></span></td>
                        </tr>
                        <tr>
                            <td>Verifikator</td>
                            <td>: <?php echo $dd->verifikator ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>