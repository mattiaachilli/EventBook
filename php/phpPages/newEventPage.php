<div class="row">
    <div class="col-md-2 col-sm-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <h2 class="text-light display-4">Nuovo evento</h2>
        <div class="form-div rounded">    
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                    <label for="name">Nome evento</label>
                    <input type="text" class="form-control" id="name">
                    <small id="wrongName" class="text-white"></small>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                    <label for="example-date-input">Data</label>
                    <input class="form-control" type="date" id="date">
                    <small id="wrongDate" class="text-white"></small>
                </div>
            </div>        
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                    <label for="description">Breve descrizione</label>
                    <textarea id="description" class="md-textarea form-control" rows="1"></textarea>
                    <small id="wrongDesc" class="text-white"></small>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                    <label for="file">Immagine evento</label>
                    <div class="input-group">
                        <input class="custom-file-input" name="image" type="file" id="image">
                        <label class="custom-file-label text-truncate" id="pathImg"></label>
                        <small id="wrongImg" class = "text-white"></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                    <label for="name">Prezzo biglietti</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="price">
                        <div class="input-group-append">
                            <div class="input-group-text">€</div>
                        </div>
                    </div>    
                    <small id="wrongPrice" class="text-white"></small>   
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                    <label id="maxTickets" for="tickets">Biglietti disponibili (max. 0)</label>
                    <input type="text" class="form-control" id="tickets">
                    <small id="wrongTickets" class = "text-white"></small>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-xs-12 mt-2">
                    <label for="category">Categoria</label>
                    <select class="custom-select" id="category">
                        <option selected></option>
                        <?php
                            $categories = $db->getCategories();
                            foreach($categories as $category) {
                                echo '<option value="'.$category["Nome"].'">'.$category["Nome"].'</option>';
                            }
                        ?>
                    </select>
                    <small id="wrongCategory" class="text-white"></small>
                </div>
                <div class="col-lg-6 col-sm-12 col-xs-12 mt-2">
                    <label for="location">Location</label>
                    <select class="custom-select" id="location">
                        <option id="selected" value=""></option>
                        <?php
                            $location_s = $db->getLocations();
                            foreach($location_s as $location) {
                                echo '<option id="'.$location["Nome"].'-'.$location["Città"].'-'.$location["Nazione"].
                                                    '">'.$location["Nome"]." - ".$location["Città"]." (".$location["Nazione"].")</option>";
                            }
                        ?>
                    </select>
                    <small id="wrongLocation" class = "text-white"></small>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-3">
                    <form action="../php/newLocation.php" method="post">
                        <button class="btn btn-primary page-btn container-fluid">Nuova location</button>
                    </form>
                </div>
                <div class="col-xs-0 col-sm-0 col-md-3 col-lg-5 col-xl-6"></div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                    <button name="createEvent" type="submit" class="btn btn-primary page-btn float-right container-fluid">Conferma</button>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12">
                    <label id="result" class = "text-white"></label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-2"></div>
</div>
<div class="row mb-5">
    <div class="col-sm-10 col-xs-12 text-right">
        <button onclick="history.back();" type="submit" class="btn btn-primary"><i class="fas fa-arrow-left"></i> back</button> 
    </div>
    <div class="col-sm-2 col-xs-0"></div>
</div>