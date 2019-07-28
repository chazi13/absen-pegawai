<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Waktu Jam Kerja</h4>
                <!-- <p class="card-category"></p> -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>No.</th>
                            <th>Keterangan</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php foreach($jam as $i => $j): ?>
                                <tr id="<?= 'jam-' . $j->id_jam ?>">
                                    <td><?= ($i+1) ?></td>
                                    <td><?= $j->keterangan ?></td>
                                    <td class="jam-start"><?= $j->start ?></td>
                                    <td class="jam-finish"><?= $j->finish ?></td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm btn-edit-jam" data-toggle="modal" data-target="#edit-jam" data-jam="<?= base64_encode(json_encode($j)) ?>"><i class="fa fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-wrapper">
    <div class="modal fade" id="edit-jam" tabindex="-1" role="dialog" aria-labelledby="edit-jam-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-edit-jam" action="<?= base_url('jam/update') ?>" method="post" onsubmit="return false">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-jam-label">Edit Jam <span id="edit-keterangan"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="start">Jam Mulai :</label>
                            <input type="hidden" name="id_jam" id="edit-id-jam">
                            <input type="time" name="start" id="edit-start" class="form-control" placeholder="Jam Mulai" required="reuired" />
                        </div>

                        <div class="form-group">
                            <label for="finish">Jam Selesai :</label>
                            <input type="time" name="finish" id="edit-finish" class="form-control" placeholder="Jam Selesai" required="reuired" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

