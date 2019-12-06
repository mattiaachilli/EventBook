<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    
    $parameters["title"] = "Registrazione - EventBook";
    $parameters["content"] = dirname(__DIR__)."/php/phpPages/registrationPage.php";
    $parameters["js"] = array("../js/registration.js", "../js/md5.js");

    require dirname(__DIR__).'/php/phpPages/base.php';
?>