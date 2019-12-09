<?php 
    $n = 0; 
    $numEvents = count($parameters["events"]);
?>

<div class="row">
    <div class="col-md-1 col-sm-0"></div>
    <div class="col-md-10 col-sm-12">
        <h2 class="text-light display-4 mt-5">
            <?php if ($numEvents > 0) echo 'Eventi che hai pubblicato'; ?>
        </h2>
    </div>
    <div class="col-md-1 col-xs-0"></div>
</div>

<?php foreach($parameters["events"] as $event) : 
    if ($n % 2 == 0) { echo '<div class="row text-light">'.'<div class="col-sm-0 col-md-1"></div>'; } 
?>
<div class="col-sm-12 col-md-5">
    <div class="form-div rounded p-0">
        <div class="row">
            <div class="col-xl-3 col-lg-12 col-xs-12 col-sm-12 p-3">
                <img src="<?php echo $event["Immagine"]?>" width="100%"/>
            </div>
            <div class="col-xl-5 col-lg-7 col-xs-12 col-md-6 col-sm-12 mt-3">
                <div class="row font-weight-bold">
                    <div class="col-12 text-truncate">
                        <?php echo $event["Nome_evento"] ?>
                    </div>
                    <input type="hidden" value= <?php echo $event["IDevento"]; ?>/>
                </div>
                <div class="row">
                    <div class="col-12 text-truncate">
                        <?php echo $event["Nome_location"].' - '.$event["Città_location"] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-truncate">
                        <?php echo $event["Data"]; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 font-weight-light font-italic text-truncate">
                        <?php echo $event["Categoria"]; ?>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        Prezzo: <?php echo $event["Prezzo"]; ?>€
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-sm-12 col-xs-12 col-md-6">
                <div class="col-12 mt-4">
                    <form action="../php/eventInfo.php" id="info">
                        <button name="ID" value="<?php echo $event["IDevento"]; ?>" 
                                type="submit" class="btn btn-primary mb-2 container-fluid">Info
                        </button>
                    </form>
                </div>
                <div class="col-12 mt-2">
                    <form id="edit">
                        <button name="ID" value="<?php echo $event["IDevento"]; ?>" 
                                type="submit" class="btn btn-primary mb-2 container-fluid">Modifica
                        </button>
                    </form>
                </div>
                <div class="col-12 mt-2">
                    <button name="delete" value="<?php echo $event["IDevento"]; ?>" 
                            type="submit" class="btn btn-danger mb-2 container-fluid">Elimina
                    </button>
                </div>
            </div>
        </div>
        <div id="areUSure<?php echo $event["IDevento"]; ?>"></div>
    </div>
</div>
<?php 
    $n++; 
    if ($n == $numEvents && $n % 2 != 0) {
        echo '<div class="col-sm-12 col-md-5"></div>';  
        echo '<div class="col-sm-0 col-md-1"></div></div>'; 
    }
    if ($n % 2 == 0) { 
        echo '<div class="col-sm-0 col-md-1"></div></div>';  
    } 
?>
<?php endforeach; ?>


