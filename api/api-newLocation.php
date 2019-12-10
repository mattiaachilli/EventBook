<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    $response = 0;
    if(isset($_POST["name"]) && isset($_POST["country"]) && isset($_POST["city"]) 
        && isset($_POST["street"]) && isset($_POST["capacity"]) && isset($_POST["civicN"])) {

        if (count($db->checkIfLocationExists($_POST["name"], $_POST["country"], $_POST["city"])) == 0) {
            $db->insertNewLocation($_POST["name"], $_POST["capacity"], $_POST["country"], 
                                   $_POST["city"], $_POST["street"], $_POST["civicN"]);
        } else {
            $response = "Esiste già una location chiamata così in questa città.";
        }
    } else {
        $response = "Alcuni campi sono vuoti.";
    }
    echo $response;
?>