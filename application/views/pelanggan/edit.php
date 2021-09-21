<div class="h2"><?php echo $title; ?></div>

<hr>

<?=form_open("pelanggan/edit/$data->id");?>
  <fieldset>
    <?=form_hidden("id", $data->id);?>

    <div class="form-group">
        <label for="txtKodepel" class="form-label mt-2">Kode Pelanggan</label>
        <input type="text" class="form-control" name="kodepel" id="txtKodepel" aria-describedby="KodepelHelp" placeholder="Kode Pelanggan" value="<?=$data->kodepel; ?>">
        <small id="judulHelp" class="form-text text-muted">Masukkan Judul Buku.</small>
    </div>
    <div class="form-group">
        <label for="txtNama" class="form-label mt-4">Nama</label>
        <input type="text" class="form-control" name="nama" id="txtNama" aria-describedby="namaHelp" placeholder="Nama Pelanggan" value="<?=$data->nama; ?>">
        <small id="pelangganHelp" class="form-text text-muted">Masukkan Nama Pelanggan.</small>
    </div>
    <div class="form-group">
        <label for="txtAlamat" class="form-label mt-4">Alamat</label>
        <input type="text" class="form-control" name="alamat" id="txtAlamat" aria-describedby="alamatHelp" placeholder="Alamat" value="<?=$data->alamat; ?>">
        <small id="alamatHelp" class="form-text text-muted">Masukkan Alamat.</small>
    </div>
    <div class="form-group">
        <label for="txtTelp" class="form-label mt-4">Telepon</label>
        <input type="text" class="form-control" name="telp" id="txtTelp" aria-describedby="telpHelp" placeholder="Telepon" value="<?=$data->telp; ?>">
        <small id="telpHelp" class="form-text text-muted">Masukkan Telepon.</small>
    </div>
    <div class="form-group">
        <label for="txtJk" class="form-label mt-4">Jenis Kelamin</label>
        <input type="text" class="form-control" name="jk" id="txtTelp" aria-describedby="jkHelp" placeholder="Jenis Kelamin" value="<?=$data->jk; ?>">
        <small id="jkHelp" class="form-text text-muted">Masukkan Jenis Kelamin.</small>
    </div>
    <div class="form-group">
        <label for="txtEmail" class="form-label mt-4">Email</label>
        <input type="text" class="form-control" name="email" id="txtEmail" aria-describedby="emailHelp" placeholder="Email" value="<?=$data->email; ?>">
        <small id="emailHelp" class="form-text text-muted">Email.</small>
    </div>
    <br>
    <button type="submit" class="btn btn-success me-1">Submit</button>
    <a href="<?=site_url('/pelanggan')?>" class="btn btn-danger">Batal</a>
  </fieldset>
  <?=form_close();?>