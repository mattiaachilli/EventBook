<?php
    require_once("bootstrap.php");

    if(isUserLoggedIn()){
        header("Location: index.php");
    } else {
        $parameters["title"] = "Cambia password - EventBook";
        $parameters["content"] = "changePasswordPage.php";
        $parameters["js"] = array("../js/changePassword.js");
    }
    
    require 'base.php';
?>