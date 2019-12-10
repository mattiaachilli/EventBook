<div class="row">
    <div class="col-md-2 col-sm-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <h2 class="text-light display-4">Nuova location</h2>
        <form class="form-div rounded p-8">    
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                    <label for="name">Nome location</label>
                    <input type="text" class="form-control" id="name">
                    <small id="wrongName" class="text-white"></small>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                    <label for="capacity">Capienza</label>
                    <input type="text" class="form-control" id="capacity">
                    <small id="wrongCapacity" class="text-white"></small>
                </div>
            </div>        
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                    <label for="country">Nazione</label>
                    <input type="text" class="form-control" id="country">
                    <small id="wrongCountry" class="text-white"></small>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                    <label for="city">Città</label>
                    <input type="text" class="form-control" id="city">
                    <small id="wrongCity" class="text-white"></small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                    <label for="street">Via</label>
                    <input type="text" class="form-control" id="street">
                    <small id="wrongStreet" class="text-white"></small>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                    <label for="civicN">N. civico</label>
                    <input type="text" class="form-control" id="civicN">
                    <small id="wrongCivicN" class="text-white"></small>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-9"></div>
                <div class="col-3">
                    <button type="submit" class="btn btn-primary page-btn float-right container-fluid">Inserisci</button>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <label id="result"></label>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-2 col-sm-2"></div>
</div>