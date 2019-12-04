<?php
    require_once("bootstrap.php");

    if(isUserLoggedIn() && typeOfUserLogged() == ADMIN) {
        $parameters["title"] = "Admin - EventBook";
        $parameters["content"] = "phpPages/insertNewCategory.php";
    } else {
        header("Location: index.php");
    }
    
    require 'phpPages\base.php';
?>