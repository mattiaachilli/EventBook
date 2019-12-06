<?php 
    $n = 0; 
    $absoluteMaxEventID = $db->getMaxEventID()[0]["IDevento"];
    $absoluteMinEventID = $db->getMinEventID()[0]["IDevento"];
    $numEvents = count($parameters["events"]);
    if ($numEvents == 0) {
        echo '<div class="col-12 text-center mb-5 font-weight-light font-italic">Non ci sono eventi in programma</div>';
    } else {
        $maxID = $parameters["events"][$numEvents - 1]["IDevento"];
        $minID = $parameters["events"][0]["IDevento"];
        if (isset($_GET["minID"])) {
            $temp = $maxID; 
            $maxID = $minID; 
            $minID = $temp;
            for ($i = 0; $i < $numEvents / 2; $i++) {
                $temp = $parameters["events"][$i];
                $parameters["events"][$i] = $parameters["events"][$numEvents - 1 - $i];
                $parameters["events"][$numEvents - 1 - $i] = $temp;
            }
        }
    }
?>

<div class="row">
    <div class="col-md-1 col-sm-0"></div>
    <div class="col-md-10 col-sm-12">
        <h2 class="text-light display-4 mt-5">
            <?php if ($numEvents > 0) echo 'Eventi in programma'; ?>
        </h2>
    </div>
    <div class="col-md-1 col-xs-0"></div>
</div>

<?php foreach($parameters["events"] as $event) : 
    if ($n % 2 == 0) { echo '<div class="row text-light">'.'<div class="col-sm-0 col-md-1"></div>'; } 
?>
<div class="col-sm-12 col-md-5">
    <form action="../php/eventInfo.php" class="form-div rounded p-4" method="get">
        <div class="row">
            <div class="col-xl-4 col-xs-12 col-sm-12">
                <img src="<?php echo $event["Immagine"]?>" width="75%"/>
            </div>
            <div class="col-xl-8 col-xs-12 col-sm-12">
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
                    <div class="col-xl-8 col-sm-12 col-xs-12">
                        Prezzo: <?php echo $event["Prezzo"]; ?>€
                    </div>
                    <div class="col-xl-4 col-sm-12 col-xs-12">
                        <button name="ID" value="<?php echo $event["IDevento"]; ?>" 
                                type="submit" class="btn btn-primary mb-2 float-right">Informazioni
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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

<div class="row mt-4">
    <div class="col-2"></div>
    <div class="col-4">
        <form action="../php/events.php">
            <button name="minID" value="<?php echo $minID; ?>" 
                    type="submit" class="btn btn-primary mb-2 float-right"
                    <?php if ($absoluteMinEventID == $minID  || $numEvents == 0) echo "disabled"; ?>><< indietro
            </button>
        </form>
    </div>
    <div class="col-4">
        <form action="../php/events.php">
            <button name="maxID" value="<?php echo $maxID; ?>" 
                    type="submit" class="btn btn-primary mb-2" 
                    <?php if ($absoluteMaxEventID == $maxID || $numEvents == 0) echo "disabled"; ?>>avanti >> 
            </button>
        </form>
    </div>
    <div class="col-2"></div>
</div>


