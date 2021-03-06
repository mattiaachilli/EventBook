<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    
    $response = 0;
    
    if(isset($_POST["eventName"]) && isset($_POST["desc"]) && isset($_POST["price"]) 
        && isset($_POST["tickets"]) && isset($_POST["date"]) && isset($_POST["category"]) 
        && isset($_POST["location"]) && isset($_POST["nazione"]) 
        && isset($_POST["città"]) && isset($_POST["path"])) {
            
            $pathImage = "../img/events/".$_POST["path"];
            if (file_exists($pathImage)) {
                $i = 1;
                while (file_exists($pathImage)) {
                    $pathImage = '../img/events/'.$i.' - '.$_POST["path"];
                    $i++;
                }
            }
            $date = strtotime($_POST["date"]);
            $date = date('Y-m-d', $date);
            if (count($db->checkExistingEvent($date, $_POST["nazione"], $_POST["città"], $_POST["location"])) == 0) {
                $db->insertNewEvent($_POST["eventName"], $date, $_POST["desc"], $pathImage,
                                    $_POST["price"], $_POST["tickets"], $_POST["category"], $_POST["location"],
                                    $_POST["nazione"], $_POST["città"]);
            } else {
                $response = "Location già occupata per la data scelta.";
            }
    } else {
        $response = "Variabili non settate.";
    }
    echo $response;
?>