<div class="row">
    <div class="col-md-2 col-sm-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <h2 class="text-light display-4">Nuovo evento</h2>
        <div class="form-div rounded">
            <form>      
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
                            <input class="custom-file-input" name="image" type="file" id="fileToUpload">
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
                    <div class="col-9"></div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary page-btn float-right">Conferma</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-2 col-sm-2"></div>
</div>