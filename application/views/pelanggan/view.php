<div class="h2"><?php echo $title; ?></div>
    <hr>

    <div class="card border-info mb-3" style="max-width: 30rem;">
        <div class="card-header h3">
            <a href="<?=site_url("/pelanggan/");?>" class="btn btn-dark btn-block">&lt;</a>
            <span class="text-center"><?=$data->nama?></span>
        </div>

        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between"><em>Kode Pelanggan:</em>          <span><?=$data->kodepel ?></span></li>
                <li class="list-group-item d-flex justify-content-between"><em>Alamat:</em>           <span><?=$data->alamat ?></span></li>
                <li class="list-group-item d-flex justify-content-between"><em>Telepon:</em>     <span><?=$data->telp ?></span></li>
                <li class="list-group-item d-flex justify-content-between"><em>Jenis Kelamin:</em>               <span><?=$data->jk ?></span></li>
                <li class="list-group-item d-flex justify-content-between"><em>Email:</em>               <span><?=$data->email ?></span></li>
            </ul>
        </div>
        <div class="card-footer">
        <?=form_open(site_url("/pelanggan/delete/$data->id"), 'method="delete"'); ?>
            <a href="<?=site_url("/pelanggan/edit/");?><?=$data->id;?>" class="btn btn-warning btn-block me-1 mt-2">Edit</a>
            <input type="submit" value="Delete" class="btn btn-danger btn-block mt-2">
        <?=form_close();?>
        </div>
    </div>
