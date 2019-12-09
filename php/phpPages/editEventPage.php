<div class="row">
    <div class="col-md-2 col-sm-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <h2 class="text-light display-4">Modifica evento</h2>
        <div class="form-div rounded">
            <form>      
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                        <label for="name">Nome evento</label>
                        <input type="text" class="form-control" id="name" value="<?php echo $parameters["event"][0]["Nome_evento"];?>">
                        <small id="wrongName" class="text-white"></small>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                        <label for="example-date-input">Data</label>
                        <input class="form-control" type="date" id="date" value="<?php echo $parameters["event"][0]["Data"];?>">
                        <small id="wrongDate" class="text-white"></small>
                    </div>
                </div>        
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                        <label for="description">Breve descrizione</label>
                        <textarea id="description" class="md-textarea form-control" rows="1"><?php echo $parameters["event"][0]["Descrizione"];?></textarea>
                        <small id="wrongDesc" class="text-white"></small>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                        <label for="file">Immagine evento</label>
                        <div class="input-group">
                            <input class="custom-file-input" name="image" type="file" id="image" value="<?php echo $parameters["event"][0]["Immagine"];?>">
                            <label class="custom-file-label text-truncate" id="pathImg"><?php echo $parameters["event"][0]["Immagine"];?></label>
                            <small id="wrongImg" class = "text-white"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                        <label for="name">Prezzo biglietti</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="price" value="<?php echo $parameters["event"][0]["Prezzo"];?>">
                            <div class="input-group-append">
                                <div class="input-group-text">€</div>
                            </div>
                        </div>    
                        <small id="wrongPrice" class="text-white"></small>   
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                        <label id="maxTickets" for="tickets">Biglietti disponibili (max. <?php echo $parameters["capacity"][0]["Capienza"]; ?>)</label>
                        <input type="text" class="form-control" id="tickets" value="<?php echo $parameters["event"][0]["Biglietti_disponibili"];?>">
                        <small id="wrongTickets" class = "text-white"></small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-xs-12 mt-2">
                        <label for="category">Categoria</label>
                        <select class="custom-select" id="category">
                            <?php 
                                $categorySelected = $parameters["event"][0]["Categoria"];
                            ?>
                            <option><?php echo $categorySelected; ?></option>
                            <?php
                                $categories = $db->getCategories();
                                foreach($categories as $category) {
                                    $currentCategory = $category["Nome"];
                                    if ($currentCategory != $categorySelected) {
                                        echo '<option value="'.$currentCategory.'">'.$currentCategory.'</option>';
                                    }
                                }
                            ?>
                        </select>
                        <small id="wrongCategory" class="text-white"></small>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-xs-12 mt-2">
                        <label for="location">Location</label>
                        <select class="custom-select" id="location">
                            <?php $locationSelected = $parameters["event"][0]["Nome_location"].' - '
                                                     .$parameters["event"][0]["Città_location"].' ('
                                                     .$parameters["event"][0]["Nazione_location"].')';?>
                            <option><?php echo $locationSelected; ?> </option>
                            <?php
                                $location_s = $db->getLocations();
                                foreach($location_s as $location) {
                                    $currentLocation = $location["Nome"]." - ".$location["Città"]." (".$location["Nazione"].")";
                                    if ($locationSelected != $currentLocation) {
                                        echo '<option id="'.$location["Nome"].'-'.$location["Città"].'-'.$location["Nazione"].'">'.$currentLocation.'</option>';
                                    }
                                }
                            ?>
                        </select>
                        <small id="wrongLocation" class = "text-white"></small>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-9"></div>
                    <div class="col-3">
                        <button type="submit" name="save" value="<?php echo $_POST["edit"];?>" 
                                class="btn btn-primary page-btn float-right">
                                Salva
                        </button>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12">
                        <label id="result" class = "text-white"></label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-2 col-sm-2"></div>
</div>