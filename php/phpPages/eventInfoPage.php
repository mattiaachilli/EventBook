<div class="row mt-5">
    <div class="col-sm-1 col-xs-0"></div>
    <div class="col-sm-9 col-xs-12">
        <h2 class="text-light display-4"><?php echo $parameters["event"][0]["Nome_evento"]; ?></h2>
    </div>
    <div class="col-sm-2 col-xs-0"></div>
</div>
<div class="row text-light">
    <div class="col-sm-1 col-xs-0"></div>
    <div class="col-sm-10 col-xs-12">
        <div class="form-div rounded p-5">
            <div class="row">
                <div class="col-xl-4 col-xs-12 col-sm-12">
                    <img src=<?php echo $parameters["event"][0]["Immagine"]; ?> width="75%"/>
                </div>
                <div class="col-xl-8 col-xs-12 col-sm-12">
                    <div class="row">
                        <div class="col-12">
                            <?php echo $parameters["event"][0]["Descrizione"]; ?> 
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            Indirizzo: <?php echo $parameters["event"][0]["Nome_location"].' - Via '
                                                 .$parameters["event"][0]["Via"].' '.$parameters["event"][0]["N_civico"].', '
                                                 .$parameters["event"][0]["Città_location"].' ('
                                                 .$parameters["event"][0]["Nazione_location"].')'; ?>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            Data: <?php echo $parameters["event"][0]["Data"];?>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 font-weight-light font-italic">
                            Genere: <?php echo $parameters["event"][0]["Categoria"];?>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-xl-2 col-sm-12 col-xs-12">
                            Prezzo: <?php echo $parameters["event"][0]["Prezzo"];?>€
                        </div>
                        <div class="col-xl-3 col-sm-0 col-xs-0"></div>
                        <div class="col-xl-3 col-sm-5 col-xs-5 w-75 mt-2">
                            <select class="custom-select" id="location">
                            <option value="">N. biglietti</option>
                                <?php
                                    for($i = 0; $i < 21; $i++) {
                                        echo '<option>'.$i.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-xl-4 col-sm-12 col-xs-12 mt-2">
                            <button type="submit" class="btn btn-primary">
                                Aggiungi al carrello
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-1 col-xs-0"></div> 
</div>
<div class="row mb-5">
    <div class="col-sm-11 col-xs-12 text-right">
        <form action="../php/events.php">
            <button type="submit" class="btn btn-primary"><< indietro</button>
        </form>
    </div>
    <div class="col-sm-1 col-xs-0"></div>
</div>

