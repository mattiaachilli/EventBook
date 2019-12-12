<div class="row mt-5">
    <div class="col-0"></div>
    <div class="col-7">
        <h1 class="text-light display-4" id="title-cart">Carrello</h1>
    </div>
    <div class="col-3">
        <button type="button" class="btn btn-primary btn-sm btn-block mt-4" id="continue">
            <span class="glyphicon glyphicon-share-alt w-50"></span> Continua ad acquistare
        </button>
    </div>
    <div class="col-lg-2 col-0"></div>
</div>

<div id="alert">
    <div class="row">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="alert" role="alert" id="alert_class">
                <h4 class="alert-heading" id="alert_heading">Attenzione!</h4>
                <div id="spinner">
                    <div class="spinner-border text-center" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <p></p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2"></div>
    </div>
</div>
<div class="row">
    <div class="col-lg-2 col-md-2"></div>
    <div class="col-lg-8 col-md-8 col-sm-12 col-12 rounded shopping-cart">
        <div class="panel panel-info text-light">
            <div class="panel-body" id="cart">
                <?php 
                    if(isset($_COOKIE["cart"]) && !empty($_COOKIE["cart"])) :
                        $arr = json_decode($_COOKIE["cart"]);
                        for($i = 0; $i < count($arr); $i++) :    
                            if($i % 2 == 0 || $i == 0) {
                                $q = $db->getEvent($arr[$i]);
                            }
                ?>
                    <div class="row">
                        <div class="col-3">
                            <img class="img-responsive w-100 border border-light rounded" src=<?php echo $q[0]["Immagine"]; ?> alt="">
                        </div>
                        <div class="col-3 text-truncate">
                            <h5 class="product-name">
                                <strong><?php echo $q[0]["Nome_evento"]; ?></strong>
                            </h5>
                            <h6>
                                <?php echo $q[0]["Descrizione"]; ?>
                            </h6>
                        </div>
                        <div class="col-1">
                            <strong class="price"> <?php echo $q[0]["Prezzo"].",00€"; ?> </strong>
                        </div>
                        <div class="col-4">
                                <input id=<?php echo "quantity".$i; ?> type="number" class="form-control input-sm w-50 ml-5 quantity" value=<?php echo $arr[++$i]; ?> min="1" max=<?php echo $q[0]["Biglietti_disponibili"]; ?>>
                                <label for=<?php echo "quantity".($i - 1); ?> class="ml-5"> Quantità</label>
                        </div>
                        <div class="row">
                            <em class="fas fa-trash trash"></em>
                        </div>
                        <input type="hidden" value=<?php echo $q[0]["IDevento"]; ?>>
                    </div>
                    <?php if($i != count($arr) - 1) : ?>
                        <hr>
                    <?php
                        endif;
                    ?>
                <?php
                        endfor;
                    endif;
                ?>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2"></div>
</div>
<div class="row">
    <div class="col-lg-2 col-md-2"></div>
    <div class="col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="panel-footer text-light" id="payment">
            <div class="row">
                <div class ="col-sm-10 col-8"></div>
                <div class="col-sm-2 col-2">
                    <h4>Totale 
                        <strong id="total"></strong>
                    </h4>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row">
                <div class ="col-sm-10 col-8"></div>
                <div class="col-sm-2 col-2">
                    <button type="button" class="btn btn-primary" id="buy">
                        Acquista
                    </button>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2"></div>
</div>