<div class="row">
    <div class="col-lg-4 col-md-2 col-sm-2"></div>
    <div class="col-lg-4 col-md-8 col-sm-8 col-12">
        <h2 class="text-light display-4">Recupero password</h2>
        <div class="form-div rounded" id="form-div">
            <form action="../api/api-sendMail.php" method= "post" id="form-login">
                <div class="col-12">
                    <label for="mail">Inserisci la tua mail</label>
                    <input type="email" class="form-control" name="mail" id="mail">
                </div>
                <div class="row text-light">
                    <div class="col-12">
                        <small id="info-alert"></small>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary page-btn float-right" >Invia</button>
                    </div>
                </div>
                <div id="wheel" class="col-12 text-center">
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-4 col-md-2 col-sm-2"></div>
</div>