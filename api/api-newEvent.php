<?php
    require_once("../php/bootstrap.php");
    
    $response = 1;
    
    if(isset($_POST["eventName"]) && isset($_POST["desc"]) && isset($_POST["price"]) 
        && isset($_POST["tickets"]) && isset($_POST["date"]) && isset($_POST["category"]) 
        && isset($_POST["location"]) && isset($_POST["nazione"]) 
        && isset($_POST["città"]) && isset($_POST["path"])) {
            
            $pathImage = "../img/events/".$_POST["path"];
            if (file_exists($pathImage)) {
                $response = 3;
            } else {
                if (count($db->checkExistingEvent($_POST["date"], $_POST["nazione"], $_POST["città"], $_POST["location"])) == 0) {
                    $db->insertNewEvent($_POST["eventName"], $_POST["date"], $_POST["desc"], $pathImage,
                                        $_POST["price"], $_POST["tickets"], $_POST["category"], $_POST["location"],
                                        $_POST["nazione"], $_POST["città"]);
                } else {
                    $response = 2;
                }
            }
    } else {
        $response = 0;
    }
    echo $response;
?>