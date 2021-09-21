<div class="h2"><?php echo $title; ?></div>
    <hr>

    <center>
        <div class="card border-secondary mb-3" style="max-width: 30rem;">
            <div class="card-header h3 justify-content-between">
                <div><?=$data->judul?></div>
                <div class="text-muted"><small><?=$data->isbn?></small></div>
            </div>
    
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between"><em>Nama Pelanggan:</em>     <span><?=$data->nama ?>&nbsp;<span>(<?=$data->pelangganid ?>)</span></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>E-Mail:</em>             <span><?=$data->email ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Telp:</em>               <span><?=$data->telp ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Tanggal Sewa:</em>       <span><?=$data->tglsewa ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Lama Sewa:</em>          <span><?=$data->lamasewa ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Keterangan:</em>         <span><?=$data->keterangan ?></span></li>
                </ul>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <span><a href="<?=site_url("/sewa/");?>" class="btn btn-dark btn-block">&lt;&lt;</a></span>
                <?=form_open(site_url("/sewa/delete/$data->id"), 'method="delete"'); ?>
                    <input type="submit" value="Delete" class="btn btn-danger btn-block mt-2">
                <?=form_close();?>
            </div>
        </div>
    </center>
