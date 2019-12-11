<div class="row mt-5">
    <div class="col-sm-2 col-xs-0"></div>
    <div class="col-sm-8 col-xs-12">
        <input type="hidden" id="event_id" value=<?php if(isset($_POST["ID"])) { echo $_POST["ID"]; } ?>> 
        <h2 class="text-light display-4"><?php echo $parameters["event"][0]["Nome_evento"]; ?></h2>
    </div>
    <div class="col-sm-2 col-xs-0"></div>
</div>
<div class="row text-light">
    <div class="col-sm-2 col-xs-0"></div>
    <div class="col-sm-8 col-xs-12">
        <div class="form-div rounded p-2">
            <div class="row">
                <div class="col-xl-4 col-md-8 col-sm-12 col-xs-12">
                    <img src="<?php echo $parameters["event"][0]["Immagine"]; ?>" width="100%"/>
                </div>
                <div class="col-xl-8 col-xs-12 col-sm-12">
                    <div class="row mt-4">
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
                        <div class="col-xl-4 col-12 mt-3">
                            Prezzo: <?php echo $parameters["event"][0]["Prezzo"];?>€
                        </div>
                        <?php if(!isUserLoggedIn() || typeOfUserLogged() == USER): ?>
                            <?php if($availableTickets[0]["Biglietti_disponibili"] > 0) : ?>
                                <div class="col-xl-3 col-md-6 col-sm-6 col-xs-5 w-75 mt-3">
                                    <select class="custom-select" id="ticket">
                                        <?php
                                            $ticket = 20;
                                            if($availableTickets[0]["Biglietti_disponibili"] < 20) {
                                                $ticket = $availableTickets[0]["Biglietti_disponibili"];
                                            }
                                            for($i = 1; $i <= $ticket; $i++) {
                                                echo '<option>'.$i.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xl-5 col-md-6 col-sm-12 col-xs-12 mt-3">
                                    <button id="addCart" type="submit" class="btn btn-primary container-fluid">
                                        Aggiungi al carrello
                                    </button>
                                    <i class = "fas fa-check fa-2x d-none" id="checkOk"></i>
                                </div>
                            <?php else: ?> 
                                <div class="col-xl-3 col-sm-5 col-xs-5 mt-2">
                                    <small class="text-light"> <strong> Evento sold out </strong> </small>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2 col-xs-0"></div> 
</div>
<div class="row mb-5 mt-4">
    <div class="col-sm-10 col-xs-12 text-right">
        <button onclick="history.back();" type="submit" class="btn btn-primary"><i class="fas fa-arrow-left"></i> back</button> 
    </div>
    <div class="col-sm-2 col-xs-0"></div>
</div>

