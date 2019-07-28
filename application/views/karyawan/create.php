<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="<?= base_url('karyawan/store') ?>" method="post">
                <div class="card-header">
                    <h4 class="card-title">Tambah Karyawan</h4>
                </div>
                <div class="card-body border-top py-0 my-3">
                    <h4 class="text-muted my-3">Profil</h4>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="nik">NIk : </label>
                                <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukan NIK Karyawan" required="reuqired" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap : </label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukana Nama Lengkap Karyawan" required="reuqired" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group">
                                <label for="telp">No. Telp : </label>
                                <input type="tel" name="telp" id="telp" class="form-control" placeholder="Masukan No. Telp" required="reuqired" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group">
                                <label for="email">E-mail : </label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email" required="reuqired" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="divisi">Divisi : </label>
                                <select name="divisi" id="divisi" class="form-control">
                                    <option value="" disabled selected>-- Pilih Divisi --</option>
                                    <?php foreach($divisi as $d): ?>
                                        <option value="<?= $d->id_divisi ?>"><?= $d->nama_divisi ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body border-top py-0 my-3">
                    <h4 class="text-muted my-3">Akun</h4>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username" required="reuqired" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="********" required="reuqired" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan <i class="fa fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>