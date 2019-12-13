<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    
    $response = 0;
    
    if(isset($_POST["eventName"]) && isset($_POST["desc"]) && isset($_POST["price"]) 
        && isset($_POST["tickets"]) && isset($_POST["date"]) && isset($_POST["category"]) 
        && isset($_POST["location"]) && isset($_POST["nazione"]) 
        && isset($_POST["città"]) && isset($_POST["path"]) && isset($_POST["oldEventID"])) {
            
            $pathImage = "../img/events/".$_POST["path"];
            $oldEvent = $db->getEvent($_POST["oldEventID"]);
            $soldTickets = count($db->getRows($_POST["oldEventID"]));
            $locationCapacity = $db->getLocationCapacity($_POST["location"], $_POST["nazione"], $_POST["città"])[0]["Capienza"];
            $existingEvent = $db->checkExistingEvent($_POST["date"], $_POST["nazione"], 
                                                     $_POST["città"], $_POST["location"]);
            if ($_POST["path"] != "" && $oldEvent[0]["Immagine"] != $pathImage) {
                if (file_exists($pathImage)) {
                    $i = 1;
                    while (file_exists($pathImage)) {
                        $pathImage = '../img/events/'.$i.' - '.$_POST["path"];
                        $i++;
                    }
                }
                unlink($oldEvent[0]["Immagine"]);
                $response = 1;
            } else {
                $pathImage = $oldEvent[0]["Immagine"];
            }

            if (count($existingEvent) == 0 || (count($existingEvent) == 1 && $oldEvent[0]["IDevento"] == $existingEvent[0]["IDevento"])) {
                if ($soldTickets > $locationCapacity) {
                    $response = "I biglietti già venduti (".$soldTickets.") superano la capienza (".$locationCapacity.") della location scelta.";
                } else if ($soldTickets + $_POST["tickets"] <= $locationCapacity) {
                    $db->editEvent($_POST["eventName"], $_POST["date"], $_POST["desc"], $pathImage,
                                        $_POST["price"], $_POST["tickets"], $_POST["category"], $_POST["location"],
                                        $_POST["nazione"], $_POST["città"], $_POST["oldEventID"]);                 
                } else {
                    $response = "I biglietti aggiunti, sommati a quelli già venduti (".$soldTickets."),
                                 superano la capienza della location scelta. (max. ".($locationCapacity - $soldTickets).")";
                }
            } else {
                $response = "Location già occupata per la data scelta.";
            }

    } else {
        $response = "Variabili non settate.";
    }
    echo $response;
?>