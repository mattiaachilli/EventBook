<div class="row">
    <div class="col-md-2 col-sm-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <h2 class="text-light display-4">Registrati</h2>
        <div class="form-div rounded">
            <form id = "reg-form" action = "<?php echo ROOT."/api/api-registration.php"?>" method = "post">
                <div class="row">
                    <div class="col-md-6 col-s-12">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name = "username" id="username">
                            <small class = "text-white"></small>
                    </div>
                    <div class="col-md-6 col-s-12">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name = "email" id="email">
                            <small class = "text-white"></small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-s-12">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name = "nome" id="nome">
                        <small class = "text-white"></small>
                    </div>
                    <div class="col-md-6 col-s-12">
                        <label for="cognome">Cognome</label>
                        <input type="text" class="form-control" name = "cognome" id="cognome">
                        <small class = "text-white"></small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-s-12">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name = "password" id="password">
                        <small class = "text-white"></small>
                    </div>
                    <div class="col-md-6 col-s-12"></div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-s-12">
                        <label for="conferma-password">Conferma password</label>
                        <input type="password" class="form-control" name = "confermaPassword" id="conferma-password">
                        <small class = "text-white"></small>
                    </div>
                    <div class="col-md-6 col-s-12"></div>
                </div>
                <div class="form-row align-items-center pl-3 pr-3 mt-4">
                    <div class="col-12 col-lg-4">
                        <div class="form-check custom-control custom-checkbox mb-2">
                            <input type="checkbox" name = "organizzatore" class="form-check-input custom-control-input" id="checkbox">
                            <label class="form-check-label custom-control-label" for="checkbox">Organizzatore</label>
                        </div>
                    </div>
                    <div class="col-0 col-lg-4"></div>
                    <div class="col-12 col-lg-4">
                        <button type="submit" id = "regButton" class="btn btn-primary mb-2 float-right">Registrati</button>
                        <div class="spinner-border text-white float-right mt-1 mr-3 d-none" role="status" id = "regSpinner">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-2 col-sm-2"></div>
</div>