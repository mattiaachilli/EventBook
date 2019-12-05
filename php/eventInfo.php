<?php
    require_once("bootstrap.php");

    $parameters["title"] = "Nome evento - EventBook";
    $parameters["content"] = "phpPages/eventInfoPage.php";
    $parameters["event"] = $db->getEvent($_GET["ID"]);;
    
    require 'phpPages\base.php';
?>