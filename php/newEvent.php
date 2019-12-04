<?php
    require_once("bootstrap.php");

    if(isUserLoggedIn() && typeOfUserLogged() == ORGANIZER) {
        $parameters["title"] = "Nuovo evento - EventBook";
        $parameters["content"] = "phpPages/newEventPage.php";
        $parameters["js"] = array("../js/newEvent.js");
    } else {
        header("Location: index.php");
    }
    
    require 'phpPages/base.php';
?>