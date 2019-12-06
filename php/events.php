<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    
    if(!isUserLoggedIn() || isUserLoggedIn() && (typeOfUserLogged() == USER || typeOfUserLogged() == ORGANIZER)) {
        $parameters["title"] = "Eventi in programma - EventBook";
        $parameters["content"] = dirname(__DIR__)."/php/phpPages/eventsPage.php";
        $parameters["events"] = $db->getAllEvents();
    } else {
        header("Location: ".ROOT."/php/index.php");
    }
    
    require dirname(__DIR__).'/php/phpPages/base.php';
?>