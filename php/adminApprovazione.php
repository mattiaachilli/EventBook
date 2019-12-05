<?php
    require_once("bootstrap.php");

    if(isUserLoggedIn() && typeOfUserLogged() == ADMIN) {
        $parameters["title"] = "Admin - EventBook";
        $parameters["js"] = array("../js/table.js", "../js/insertRows.js");
        $parameters["events"] = $db->getEvents();
        $parameters["content"] = "phpPages/tableApprovazioni.php";
    } else {
        header("Location: index.php");
    }
    require 'phpPages\base.php';
?>