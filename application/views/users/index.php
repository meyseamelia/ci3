<div class="h2"><?php echo $title; ?></div>
    <hr>
    
    <div class="row">
        <?php foreach($data as $item) : ?>
        <div class="col">
            <div class="card border-primary mb-3 mx-auto" style="max-width: 30rem;">
                <div class="card-header h4 d-flex justify-content-between">
                    <?=$item->name ?>
                    <a href="<?=site_url('/users/view/')?><?=$item->username ?>" class="btn btn-secondary fw-bold">&gt;</a>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <em>Name:</em>
                            <span><?=$item->email ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>