<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    if(isUserLoggedIn() && typeOfUserLogged() == USER) {
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
        $parameters["title"] = "Ordini - EventBook";
        $parameters["events"] = $db->getOrders($currentID, $nextOrPrev);
        $parameters["content"] = dirname(__DIR__)."/php/phpPages/ordersPage.php";
    } else {
        header("Location: ".ROOT."/php/index.php");
    }

    require dirname(__DIR__).'/php/phpPages/base.php';
?>