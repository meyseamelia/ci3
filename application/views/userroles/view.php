<div class="h2"><?php echo $title; ?></div>
    <hr>

    <center>
        <div class="card border-info mb-3" style="max-width: 30rem;">
            <div class="card-header h3">
                <span class="text-center"><?=$data->name?></span>
            </div>

            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between"><em>UserName:</em>   <span><?=$data->username ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>E-Mail:</em>     <span><?=$data->email ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Postal Code:</em><span><?=$data->zipcode ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Reg. Date:</em>  <span><?=date('Y-m-d H:i',strtotime($data->regdate)); ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>User Role:</em>  <span><?=strtoupper($data->role) ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>User Status:</em><span><?=$data->aktif?'Aktif':'Tidak Aktif' ?></span></li>
                </ul>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <a href="<?=site_url("/userroles/");?>" class="btn btn-secondary fw-bold">&lt;</a>
                <?=form_open(site_url("/userroles/delete/$data->id")); ?>
                    <a href="<?=site_url("/userroles/edit/");?><?=$data->userid;?>" class="btn btn-warning btn-block me-1 mt-2">Edit</a>
                    <input type="submit" value="Delete" class="btn btn-danger btn-block mt-2">
                <?=form_close();?>
            </div>
        </div>
    </center>
