<div class="row">
    <div class="col-lg-4 col-md-2 col-sm-2"></div>
    <div class="col-lg-4 col-md-8 col-sm-8 col-12">
        <h2 class="text-light display-4">Login</h2>
        <div class="form-div rounded" id="form-div">
            <form action = "<?php echo ROOT."/api/api-login.php" ?>" method = "post" id="form-login">
                <div class="col-12">
                    <label for="username-email">Username / Email </label>
                    <input type="text" class="form-control" id="username-email" name="username">
                </div>
                <div class="col-12 mt-2">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small id="msg" class="text-light"></small>
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="checkbox" name="checkbox">
                            <label class="custom-control-label" for="checkbox">Ricordami</label>
                        </div>
                    </div>
                    <div class="col-3"></div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary page-btn float-right" >Accedi</button>
                    </div>
                    <hr/>
                </div>
                <div class="row mt-4">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <hr/>
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="row mt-2 text-center">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <a href="../php/sendMail.php" class="">Hai dimenticato la password?</a>
                    </div>
                    <div class="col-2"></div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-4 col-md-2 col-sm-2"></div>
</div>