<?php
    require_once("bootstrap.php");

    if(isUserLoggedIn()){
        header("Location: ".ROOT."/php/index.php");
    }
    else{ /* If is not logged */
        $parameters["title"] = "Invia mail - EventBook";
        $parameters["content"] = dirname(__DIR__)."/php/phpPages/sendMailPage.php";
        $parameters["js"] = array("../js/sendMail.js");
    }

    require dirname(__DIR__).'/php/phpPages/base.php';
?>