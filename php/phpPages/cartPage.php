<div class="row">
    <div class="col-lg-2 col-md-2"></div>
    <div class="panel-heading col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="panel-title">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-light display-4" id="title-cart">Carrello</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-primary btn-sm btn-block mt-4" id="continue">
                        <span class="glyphicon glyphicon-share-alt w-50"></span> Continua ad acquistare
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2"></div>
</div>
<div id="alert">
    <div class="row">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="alert" role="alert" id="alert_class">
                <h4 class="alert-heading" id="alert_heading"></h4>
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
                <?php if(isset($_COOKIE["cart"])) :
                        $arr = json_decode($_COOKIE["cart"]);
                        for($i = 0; $i < count($arr); $i++) :    
                            if($i % 2 == 0 || $i == 0) {
                                $q = $db->getEvent($arr[$i]);
                            }
                ?>
                    <div class="row">
                        <div class="col-3">
                            <img class="img-responsive w-100 border border-light rounded" src=<?php echo $q[0]["Immagine"]; ?>>
                        </div>
                        <div class="col-3">
                            <h5 class="product-name">
                                <a href=<?php echo "eventInfo.php?ID=".$q[0]["IDevento"]; ?>> <strong><?php echo $q[0]["Nome_evento"]; ?></strong></a>
                            </h5>
                            <h6>
                                <?php echo $q[0]["Descrizione"]; ?>
                            </h6>
                        </div>
                        <div class="col-1">
                            <strong class="price"> <?php echo $q[0]["Prezzo"].",00€"; ?> </strong>
                        </div>
                        <div class="col-4">
                            <input type="number" class="form-control input-sm w-50 ml-5" value=<?php echo $arr[++$i]; ?> id="quantity" readonly="true">
                        </div>
                        <div class="row">
                            <i class="fas fa-trash trash"></i>
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
                    <h4">Totale 
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