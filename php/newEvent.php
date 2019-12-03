<?php
    require_once("bootstrap.php");

    $parameters["title"] = "Nuovo evento - EventBook";
    $parameters["content"] = "phpPages/newEventPage.php";
    $parameters["js"] = array("../js/newEvent.js");
    
    require 'phpPages/base.php';
?>