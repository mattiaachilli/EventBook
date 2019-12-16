<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    $parameters["title"] = "Modifica evento - EventBook";
    $parameters["content"] = dirname(__DIR__)."/php/phpPages/editEventPage.php";
    $parameters["event"] = $db->getEvent($_POST["edit"]);
    $parameters["capacity"] = $db->getLocationCapacity($parameters["event"][0]["Nome_location"], 
                                                       $parameters["event"][0]["Nazione_location"], 
                                                       $parameters["event"][0]["Città_location"]);
    $parameters["js"] = array("../js/editEvent.js", "../js/datepicker.js");

    require dirname(__DIR__).'/php/phpPages/base.php';
?>