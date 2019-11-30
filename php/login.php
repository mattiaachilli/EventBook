<?php
    require_once("bootstrap.php");

    if(isUserLoggedIn()){
        $templateParams["title"] = "Home - EventBook";
        $parameters["content"] = "home.php";
    }
    else{ /* If is not logged */
        $parameters["title"] = "Login - EventBook";
        $parameters["content"] = "loginPage.php";
        $parameters["js"] = array("../js/login.js");
    }

    require 'base.php';
?>