<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    
    $parameters["title"] = "Modifica account - EventBook";
    $parameters["content"] = dirname(__DIR__)."/php/phpPages/modifyAccountPage.php";
    $parameters["user"] = $db->getUser();

    require dirname(__DIR__).'/php/phpPages/base.php';
?>