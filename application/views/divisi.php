<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title float-left">Divisi Karyawan</h4>
                <div class="d-inline ml-auto float-right">
                    <a href="#" class="btn btn-success btn-sm btn-add-divisi" data-toggle="modal" data-target="#modal-add-divisi"><i class="fa fa-plus"></i> Tambah Divisi</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>No.</th>
                            <th>Nama Divisi</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody id="tbody-divisi">
                            <?php foreach($divisi as $i => $d): ?>
                                <tr id="<?= 'divisi-' . $d->id_divisi ?>">
                                    <td><?= ($i+1) ?></td>
                                    <td class="nama-divisi"><?= $d->nama_divisi ?></td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm btn-edit-divisi" data-toggle="modal" data-target="#modal-edit-divisi" data-divisi="<?= base64_encode(json_encode($d)) ?>"><i class="fa fa-edit"></i> Edit</a> 
                                        <a href="<?= base_url('divisi/destroy/' . $d->id_divisi) ?>" class="btn btn-danger btn-sm btn-delete ml-2" onclick="return false"><i class="fa fa-trash"></i> Hapus</a>
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

<div class="modal fade" id="modal-add-divisi" tabindex="-1" role="dialog" aria-labelledby="modal-add-divisi-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-add-divisi" action="<?= base_url('divisi/store') ?>" method="post" onsubmit="return false">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-add-divisi-label">Tambah Divisi Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama-divisi">Nama Divisi :</label>
                        <input type="text" name="nama_divisi" id="nama-divisi" class="form-control" placeholder="Nama Divisi" required="reuired" />
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

<div class="modal fade" id="modal-edit-divisi" tabindex="-1" role="dialog" aria-labelledby="modal-edit-divisi-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-edit-divisi" action="<?= base_url('divisi/update') ?>" method="post" onsubmit="return false">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-edit-divisi-label">Edit Divisi Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit-nama-divisi">Nama Divisi :</label>
                        <input type="hidden" name="id_divisi" id="edit-id-divisi">
                        <input type="text" name="nama_divisi" id="edit-nama-divisi" class="form-control" placeholder="Nama Divisi" required="reuired" />
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
