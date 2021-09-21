<div class="h2"><?php echo $title; ?></div>

<hr>

<?=form_open("userroles/edit/$userroles->id");?>
  <fieldset>
    <?=form_hidden("id", $userroles->id);?>
    <?=form_hidden("userid", $userroles->userid);?>

    <div class="form-group">
        <label for="txtName" class="form-label mt-4">Nama</label>
        <input type="text" class="form-control" name="name" id="txtName" aria-describedby="nameHelp" placeholder="Nama User" value="<?=$userroles->name; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="txtUserRole" class="form-label mt-4">User Role</label>
        <select name="userRole" id="txtUserRole" class="form-control">
        <?php foreach ($roles as $rItems) : ?>
            <option value="<?=$rItems->id?>" <?=($rItems->id == $userroles->roleid)?'selected':'' ?> ><?=$rItems->role?></option>
        <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label for="txtUserStatus" class="form-label mt-4">Status</label>
        <select name="aktif" id="txtUserStatus" class="form-control">
            <option value="0" <?=$userroles->aktif?'':'selected'?> >Tidak Aktif</option>
            <option value="1" <?=$userroles->aktif?'selected':''?> >Aktif</option>
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-success me-1">Submit</button>
    <a href="<?=site_url('/userroles')?>" class="btn btn-danger">Batal</a>
  </fieldset>
  <?=form_close();?>