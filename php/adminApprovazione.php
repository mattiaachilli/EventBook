<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    if(isUserLoggedIn() && typeOfUserLogged() == ADMIN) {
        $parameters["title"] = "Admin - EventBook";
        $parameters["content"] = dirname(__DIR__)."/php/phpPages/tableApprovazioni.php";
        $parameters["js"] = array("../js/table.js");
    } else {
        header("Location: ".ROOT."/php/index.php");
    }
    require dirname(__DIR__).'/php/phpPages/base.php';
?>