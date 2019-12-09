<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    $parameters["title"] = "Nuova location - EventBook";
    $parameters["content"] = dirname(__DIR__)."/php/phpPages/newLocationPage.php";
    $parameters["js"] = array("../js/newLocation.js");

    require dirname(__DIR__).'/php/phpPages/base.php';
?>