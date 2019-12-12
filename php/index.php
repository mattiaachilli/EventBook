<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");

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
    $parameters["content"] = dirname(__DIR__)."/php/phpPages/eventsPage.php";
    
    require dirname(__DIR__).'/php/phpPages/base.php';
?>