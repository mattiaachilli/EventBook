<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    if(isUserLoggedIn() && typeOfUserLogged() == ORGANIZER) {
        $parameters["title"] = "Eventi pubblicati";
        $parameters["content"] = dirname(__DIR__)."/php/phpPages/publishedEventsPage.php";
        $parameters["events"] = $db->getPublishiedEvents($_SESSION["user"][0]);
        $parameters["js"] = array("../js/deleteEvent.js");
    } else {
        header("Location: ".ROOT."/php/index.php");
    }
    require dirname(__DIR__).'/php/phpPages/base.php';
?>