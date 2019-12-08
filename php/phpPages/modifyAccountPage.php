<div class="row">
    <div class="col-md-2 col-sm-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <h2 class="text-light display-4">Modifica il tuo account</h2>
        <div class="form-div rounded">
            <form id = "reg-form" action = "<?php echo ROOT."/api/api-registration.php"?>" method = "post">
                <div class="row">
                    <div class="col-md-6 col-s-12">
                            <label for="precUser">Precedente Username</label>
                            <input type="text" readonly class="form-control font-italic" name = "precUser" id="precUser" value = "<?php echo $parameters["user"][0]["Username"]?>">
                            <small class = "text-white"></small>
                    </div>
                    <div class="col-md-6 col-s-12">
                            <label for="newUser">Nuovo username</label>
                            <input type="text" class="form-control" name = "newUSer" id="newUser">
                            <small class = "text-white"></small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-s-12">
                        <label for="precEmail">Precedente E-Mail</label>
                        <input type="text" readonly class="form-control font-italic" name = "precEmail" id="precEmail" value = "<?php echo $parameters["user"][0]["Email"]?>">
                        <small class = "text-white"></small>
                    </div>
                    <div class="col-md-6 col-s-12">
                        <label for="newEmail">Nuova E-mail</label>
                        <input type="email" class="form-control" name = "newEmail" id="newEmail">
                        <small class = "text-white"></small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-s-12">
                        <label for="precPassword">Inserisci password precedente</label>
                        <input type="password" class="form-control" name = "precPassword" id="precPassword">
                        <small class = "text-white"></small>
                    </div>
                    <div class="col-md-6 col-s-12">
                        <label for="cognome">Inserisci nuova password</label>
                        <input type="text" class="form-control" name = "cognome" id="cognome">
                        <small class = "text-white"></small>
                    </div>
                </div>
                <div class="form-row align-items-center pl-3 pr-3 mt-4">
                    <div class="col-12 col-lg-4"></div>
                    <div class="col-0 col-lg-4"></div>
                    <div class="col-12 col-lg-4">
                        <button type="submit" id = "regButton" class="btn btn-primary mb-2 float-right">Modifica</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-2 col-sm-2"></div>
</div>