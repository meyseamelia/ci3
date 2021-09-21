<div class="h2"><?php echo $title; ?></div>
    <hr>

    <div class="row">
        <?php foreach($aSewa as $item) : ?>
        <div class="col">
            <div class="card border-secondary mb-3 mx-auto" style="min-width: 20rem; max-width: 30rem;">
                <div class="card-header h4 d-flex justify-content-between">
                    <?=$item->isbn ?>
                    <a href="<?=site_url('/sewa/view/')?><?=$item->id ?>" class="btn btn-secondary fw-bold">&gt;</a>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <em>ID Pelanggan:</em>
                            <span><?=$item->pelangganid ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <em>Tanggal Sewa:</em>
                            <span><?=$item->tglsewa ?></span>
                        </li>
                    </ul>
                </div>                
            </div>
        </div>
        <?php endforeach ?>
    </div>