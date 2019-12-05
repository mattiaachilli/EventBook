<?php
    require_once("bootstrap.php");

    if(isUserLoggedIn() && typeOfUserLogged() == ADMIN) {
        $parameters["title"] = "Admin - EventBook";
        $parameters["js"] = array("../js/table.js", "../js/insertRows.js");
        $parameters["events"] = $db->getEvents();
        $parameters["content"] = "phpPages/tableApprovazioni.php";
        $parameters["content"] = dirname(__DIR__)."/php/phpPages/tableApprovazioni.php";
        $parameters["js"] = array("../js/table.js");
    } else {
        header("Location: ".ROOT."/php/index.php");
    }
    require dirname(__DIR__).'/php/phpPages/base.php';
?>