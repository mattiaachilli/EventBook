<?php
    require_once("bootstrap.php");

    if(isUserLoggedIn()){
        //$templateParams["title"] = "Home - EventBook";
        header("Location: index.php");
    }
    else{ /* If is not logged */
        $parameters["title"] = "Invia mail - EventBook";
        $parameters["content"] = "phpPages/sendMailPage.php";
        $parameters["js"] = array("../js/sendMail.js");
     
    }

    require 'phpPages\base.php';
?>