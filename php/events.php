<?php
    require_once("bootstrap.php");
    
    if(!isUserLoggedIn() || isUserLoggedIn() && (typeOfUserLogged() == USER || typeOfUserLogged() == ORGANIZER)) {
        $parameters["title"] = "Eventi in programma - EventBook";
        $parameters["content"] = "phpPages/eventsPage.php";
    } else {
        header("Location: index.php");
    }
    
    require 'phpPages/base.php';
?>