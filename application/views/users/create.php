<div class="h2 d-flex justify-content-between">
        <?php echo $title; ?>
        <small><?=$datetime; ?></small>
    </div>
    <hr>

    <?=form_open('users/create');?>
    <fieldset>
        <div class="form-group">
            <label for="txtFullName" class="form-label mt-3">Full Name</label>
            <input type="text" class="form-control" name="fullName" id="txtFullName" aria-describedby="fullNameHelp" placeholder="User Full Name">
        </div>

        <div class="form-group">
            <label for="txtZipCode" class="form-label mt-3">Postal Code</label>
            <input type="text" class="form-control" name="zipCode" id="txtZipCode" aria-describedby="zipCodeHelp" placeholder="User PostalCode">
        </div>

        <div class="form-group">
            <label for="txtEmail" class="form-label mt-3">E-Mail</label>
            <input type="email" min="0" max="14" class="form-control" name="email" id="txtEmail" aria-describedby="emailHelp" placeholder="User E-Mail">
        </div>

        <div class="form-group">
            <label for="txtUserName" class="form-label mt-3">User Name</label>
            <input type="text" class="form-control" name="userName" id="txtUserName" aria-describedby="userNameHelp" placeholder="User Login Name">
        </div>

        <div class="form-group">
            <label for="txtPassword" class="form-label mt-3">User Password</label>
            <input type="text" class="form-control" name="password" id="txtPassword" aria-describedby="passwordHelp" placeholder="User Login Password">
        </div>

        <button type="submit" class="btn btn-primary my-3">Submit</button>
    </fieldset>
    <?=form_close();?>