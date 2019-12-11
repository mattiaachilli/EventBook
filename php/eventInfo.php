<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    $parameters["title"] = "Nome evento - EventBook";
    $parameters["content"] = dirname(__DIR__)."/php/phpPages/eventInfoPage.php";
    $parameters["event"] = $db->getEvent($_GET["ID"]);
    $parameters["js"] = array("../js/addShoppingCart.js");
    $availableTickets =  $db->getTicketsAvailable($_GET["ID"]);

    require dirname(__DIR__).'/php/phpPages/base.php';
?>