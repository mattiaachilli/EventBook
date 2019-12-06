<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    
    if(!isUserLoggedIn() || isUserLoggedIn() && (typeOfUserLogged() == USER || typeOfUserLogged() == ORGANIZER)) {
        $currentID = 0;
        $nextOrPrev = 0;
        if (isset($_GET["maxID"])) {
            $currentID = $_GET["maxID"];
            $nextOrPrev = 0;
        }
        if (isset($_GET["minID"])) {
            $currentID = $_GET["minID"];
            $nextOrPrev = 1;
        }
        $parameters["title"] = "Eventi in programma - EventBook";
        $parameters["content"] = dirname(__DIR__)."/php/phpPages/eventsPage.php";
        $parameters["events"] = $db->getNextOrPrevEvents($currentID, $nextOrPrev);
    } else {
        header("Location: ".ROOT."/php/index.php");
    }
    
    require dirname(__DIR__).'/php/phpPages/base.php';
?>