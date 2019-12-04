<?php
    require_once("bootstrap.php");

    if(isUserLoggedIn() && typeOfUserLogged() == ADMIN) {
        $parameters["title"] = "Admin - EventBook";
        $parameters["content"] = "phpPages/adminPage.php";
        $parameters["js"] = array("../js/table.js");
    } else {
        header("Location: index.php");
    }

    
    require 'phpPages\base.php';
?>