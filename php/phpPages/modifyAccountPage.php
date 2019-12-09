<div class="row">
    <div class="col-md-2 col-sm-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <h2 class="text-light display-4">Modifica il tuo account</h2>
        <div class="form-div rounded">
            <form id = "reg-form" action = "<?php echo ROOT."/api/api-modify.php"?>" method = "post">
                <div class="row">
                    <div class = "col-0 col-md-2"></div>
                    <div class = "col-12 col-md-8">
                            <label for="user">Username</label>
                            <input type="text" class="form-control" name = "user" id="user" value = "<?php echo $parameters["user"][0]["Username"]?>">
                            <small id = "userSmall" class = "text-white"></small>
                    </div>
                    <div class = "col-0 col-md-2"></div>
                </div>
                <div class="row">
                    <div class = "col-0 col-md-2"></div>
                    <div class="col-12 col-md-8">
                        <label for="email">E-Mail</label>
                        <input type="text" class="form-control" name = "email" id="email" value = "<?php echo $parameters["user"][0]["Email"]?>">
                        <small id = "emailSmall" class = "text-white"></small>
                    </div>
                    <div class = "col-0 col-md-2"></div>
                </div>
                <div class="row">
                    <div class = "col-0 col-md-2"></div>
                    <div class="col-12 col-md-8">
                        <label for="precPassword">Inserisci nuova password</label>
                        <input type="password" class="form-control" name = "password" id="password">
                    </div>
                    <div class = "col-0 col-md-2"></div>
                </div>
                <div class="form-row align-items-center pl-3 pr-3 mt-4">
                    <div class = "col-0 col-md-2"></div>
                    <div class="col-12 col-md-8 p-2">
                        <button type="submit" id = "salvaButton" class="btn btn-primary mb-2 float-right">Salva</button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Elimina</button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="button" id = "eliminaButton" class="btn btn-danger mb-2 float-left">
                                    <a href = "<?php echo ROOT."/php/remove.php"?>">Elimina</a>
                                </button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class = "col-0 col-md-2"></div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-2 col-sm-2"></div>
</div>