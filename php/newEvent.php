<?php
    require_once("bootstrap.php");
    
    if(isUserLoggedIn() && typeOfUserLogged() == ORGANIZER) {
        $parameters["title"] = "Nuovo evento - EventBook";
        $parameters["content"] = dirname(__DIR__)."/php/phpPages/newEventPage.php";
        $parameters["js"] = array("../js/newEvent.js");
    } else {
        header("Location: index.php");
    }
    
    require dirname(__DIR__).'/php/phpPages/base.php';
?>