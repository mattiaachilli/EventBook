<?php
    require_once("../php/bootstrap.php");
    if(isset($_POST["locationName"]) && isset($_POST["locationCountry"]) && isset($_POST["locationCity"])) {
        $newCapacity = $db->getLocationCapacity($_POST["locationName"], $_POST["locationCountry"], $_POST["locationCity"]);
        echo $newCapacity[0]["Capienza"];
    } else {
        echo 1;
    }
?>