<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Absen Harian</h4>
            </div>
            <div class="card-body">
                <table class="table w-100">
                    <thead>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Absen Masuk</th>
                        <th>Absen Pulang</th>
                    </thead>
                    <tbody>
                        <tr>
                            <?php if(is_weekend()): ?>
                                <td class="bg-light text-danger" colspan="4">Hari ini libur. Tidak Perlu absen</td>
                            <?php else: ?>
                                <td><i class="fa fa-3x fa-<?= ($absen < 2) ? "warning text-warning" : "check-circle-o text-success" ?>"></i></td>
                                <td><?= tgl_hari(date('d-m-Y')) ?></td>
                                <td>
                                    <a href="<?= base_url('absensi/absen/masuk') ?>" class="btn btn-primary btn-sm btn-fill"<?= ($absen == 1) ? 'disabled style="cursor:not-allowed"' : '' ?>>Absen Masuk</a>
                                </td>
                                <td>
                                    <a href="<?= base_url('absensi/absen/pulang') ?>" class="btn btn-success btn-sm btn-fill"<?= ($absen !== 1 || $absen == 2) ? 'disabled style="cursor:not-allowed"' : '' ?>>Absen Pulang</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>