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
                        <label for="password">Inserisci nuova password</label>
                        <input type="password" class="form-control" name = "password" id="password">
                    </div>
                    <div class = "col-0 col-md-2"></div>
                </div>
                <div class="form-row align-items-center pl-3 pr-3 mt-4">
                    <div class = "col-0 col-md-2"></div>
                    <div class="col-12 col-md-8 p-2">
                        <div class="spinner-border text-white float-right mt-1 d-none mr-3" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <button type="submit" id = "salvaButton" class="btn btn-primary mb-2 float-right">Salva</button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDel">Elimina</button>
                        <!-- Modal -->
                        <div class="modal fade" id="modalDel" tabindex="-1" role="dialog" aria-labelledby="modalDelhead" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="modalDelhead">Elimina account</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Sei sicuro di volerci lasciare?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                        <a id = "eliminaButton" class = "btn btn-danger" href = "<?php echo ROOT."/php/remove.php"?>">Elimina</a>
                                        <div class="spinner-border text-danger float-right ml-2 mt-1 mr-3 d-none" role="status" id = "eliminaSpinner">
                                            <span class="sr-only">Loading...</span>
                                        </div>
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
<div class="row mb-5">
    <div class="col-sm-10 col-xs-12 text-right">
        <button onclick="history.back();" type="submit" class="btn btn-primary"><em class="fas fa-arrow-left"></em> back</button> 
    </div>
    <div class="col-sm-2 col-xs-0"></div>
</div>