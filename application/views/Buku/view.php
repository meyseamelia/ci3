<div class="h2"><?php echo $title; ?></div>
        
        <div class="card bg-light mb-3" style="max-width: 30rem;">
            <div class="card-header h3">
                <a href="<?=site_url("/buku/");?>" class="btn btn-dark">&lt;</a>
                <span class="text-center"><?=$data->judul ?></span>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between"><em>Pengarang:</em>          <span><strong><?=$data->pengarang ?></strong></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Penerbit:</em>           <span><?=$data->penerbit ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Tanggal Terbit:</em>     <span><?=$data->tglterbit ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>ISBN:</em>               <span><?=$data->isbn ?></span></li>
                </ul>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <span>&nbsp;</span>
                <?=form_open(site_url("/buku/delete/$data->id"), 'style="width:100px" method="delete"'); ?>
                    <a href="<?=site_url("/buku/edit/");?><?=$data->id;?>" class="btn btn-success btn-block">Edit</a>
                    <input type="submit" value="delete" class="btn btn-danger btn-block">
                <?=form_close();?>
            </div>
        </div>