<div class="row">
    <div class="col-sm-2 col-xl-4"></div>
    <div class="col-sm-8 col-xl-4">
        <h2 class="text-light display-4 mt-4">Nuova categoria eventi</h2>
    </div>
    <div class="col-sm-2 col-xl-4"></div>
</div>
<div class="row">
    <div class="col-sm-2 col-xl-4"></div>
    <div class="col-sm-8 col-xl-4 col-12">
        <div class = "form-div rounded">
            <form action = "<?php echo ROOT."/api/api-category.php"?>" method= "get" id="form-login">
                <div class="col-12">
                    <label for="category">Inserisci categoria</label>
                    <input type="text" class="form-control" id="category" name = "categoria">
                    <small id="info-alert" class = "text-white"></small>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary page-btn float-right">Invia</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-sm-2 col-xl-4"></div>
</div>
<div class="row mb-5">
    <div class="col-sm-10 col-xl-8 col-xs-12 text-right">
        <button onclick="history.back();" type="submit" class="btn btn-primary"><i class="fas fa-arrow-left"></i> back</button> 
    </div>
    <div class="col-sm-2 col-xl-4 col-xs-0"></div>
</div>