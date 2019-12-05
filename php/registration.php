<?php
    require_once("bootstrap.php");

    $parameters["title"] = "Registrazione - EventBook";
    $parameters["content"] = "phpPages/registrationPage.php";
    $parameters["js"] = array("../js/registration.js", "../js/md5.js");
    require 'phpPages\base.php';
?>