<?php
    require_once("bootstrap.php");

    if(isUserLoggedIn() && typeOfUserLogged() == ADMIN) {
        $parameters["title"] = "Admin - EventBook";
        $parameters["content"] = dirname(__DIR__)."/php/phpPages/insertNewCategory.php";
    } else {
        header("Location: ".ROOT."/php/index.php");
    }
    
    require dirname(__DIR__).'/php/phpPages/base.php';
?>