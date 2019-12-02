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
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                        <label for="example-date-input">Data</label>
                        <input class="form-control" type="date" id="example-date-input">
                    </div>
                </div>        
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                        <label for="description">Breve descrizione</label>
                        <textarea id="description" class="md-textarea form-control" rows="1"></textarea>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                        <label for="file">Scegli un'immagine per l'evento</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="uploadImg">
                                <label class="custom-file-label" for="uploadImg"></label>
                            </div>
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
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                        <label for="tickets">Biglietti disponibili (max. #######)</label>
                        <input type="text" class="form-control" id="tickets">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-xs-12 mt-2">
                        <label for="category">Categoria</label>
                        <select class="custom-select" id="category">
                            <option selected>Choose...</option>
                            <?php
                                $categories = $db->getCategories();
                                foreach($categories as $category) {
                                    echo '<option value="'.$category["Nome"].'">'.$category["Nome"].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-xs-12 mt-2">
                        <label for="location">Location</label>
                        <select class="custom-select" id="location">
                            <option selected>Choose...</option>
                            <?php
                                $location_s = $db->getLocations();
                                foreach($location_s as $location) {
                                    echo '<option value="'.$location["Nome"].'">'.$location["Nome"].'</option>';
                                }
                            ?>
                        </select>
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



