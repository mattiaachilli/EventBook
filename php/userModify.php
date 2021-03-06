<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    
    if (isUserLoggedIn() && typeOfUserLogged() != ADMIN) {
        $parameters["title"] = "Modifica account - EventBook";
        $parameters["content"] = dirname(__DIR__)."/php/phpPages/modifyAccountPage.php";
        $parameters["user"] = $db->getUser();
        $parameters["js"] = array("../js/modify.js", "../js/md5.js");
    } else {
        header("Location: ".ROOT."/php/index.php");
    }

    require_once dirname(__DIR__).'/php/phpPages/base.php';
?>