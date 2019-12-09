<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    if(isUserLoggedIn() && typeOfUserLogged() == ADMIN) {
        $parameters["title"] = "Admin - EventBook";
        $parameters["js"] = array("../js/table.js");
        $parameters["events"] = $db->getEvents();
        $parameters["content"] = dirname(__DIR__)."/php/phpPages/tableApprovazioni.php";
    } else {
        header("Location: ".ROOT."/php/index.php");
    }
    require dirname(__DIR__).'/php/phpPages/base.php';
?>