<?php
    require_once("bootstrap.php");

    if(isUserLoggedIn()){
        //$templateParams["title"] = "Home - EventBook";
        header("Location: index.php");
    }
    else{ /* If is not logged */
        $parameters["title"] = "Login - EventBook";
        $parameters["content"] = "loginPage.php";
        $parameters["js"] = array("../js/login.js");
    }

    require 'base.php';
?>