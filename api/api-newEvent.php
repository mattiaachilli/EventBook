<?php
    require_once("../php/bootstrap.php");
    
    $response = 1;
    
    if(isset($_POST["eventName"]) && isset($_POST["desc"]) && isset($_POST["price"]) 
        && isset($_POST["tickets"]) && isset($_POST["date"]) && isset($_POST["category"]) 
        && isset($_POST["location"])  && isset($_POST["path"])) {
        
            if (/*count($db->checkExistingEvent())*/0 == 0) {
                $pathImage = "../img/events/".$_POST["path"];
                $db->insertNewEvent($_POST["eventName"], $_POST["date"], $_POST["desc"], $pathImage,
                                    $_POST["price"], $_POST["tickets"], $_POST["category"], $_POST["location"],
                                    $_POST["nazione"], $_POST["città"]);
            } else {
                $response = 2;
            }
    } else {
        $response = 0;
    }
    echo $response;
?>