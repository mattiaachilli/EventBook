<?php
    $date = $parameters["event"][0]["Data"];
    $date = strtotime($date);
    $date = date('m/d/Y', $date);
?>
<div class="row">
    <div class="col-md-2 col-sm-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <h2 class="text-light display-4">Modifica evento</h2>
        <div class="form-div rounded">    
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                    <label for="name">Nome evento</label>
                    <input type="text" class="form-control" id="name" value="<?php echo $parameters["event"][0]["Nome_evento"];?>">
                    <small id="wrongName" class="text-white"></small>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                    <label for="date">Data<small> (mm/gg/aaaa)</small></label>
                    <div class="input-group">
                        <input class="form-control" id="date" name="date" placeholder="mm/gg/aaaa" 
                               type="text" value="<?php echo $date; ?>"/>
                        <div class="input-group-append">
                            <div class="input-group-text"><em class="fas fa-calendar-alt"></em></div>
                        </div>
                    </div>
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
                    <label for="image">Immagine evento</label>
                    <div class="input-group">
                        <input class="custom-file-input" name="image" type="file" id="image">
                        <label class="custom-file-label text-truncate" id="pathImg"><?php echo $parameters["event"][0]["Immagine"];?></label>
                        <small id="wrongImg" class = "text-white"></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 mt-2">
                    <label for="price">Prezzo biglietti</label>
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
                                    echo '<option>'.$currentCategory.'</option>';
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
                                    echo '<option>'.$currentLocation.'</option>';
                                }
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
                    <button name="save" value="<?php echo $_POST["edit"];?>" 
                            class="btn btn-primary page-btn float-right container-fluid">
                            Salva
                    </button>
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
