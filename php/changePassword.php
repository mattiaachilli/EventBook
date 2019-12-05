<?php
    require_once("bootstrap.php");

    if(isUserLoggedIn()){
        header("Location: ".ROOT."/php/index.php");
    } else {
        $parameters["title"] = "Cambia password - EventBook";
        $parameters["content"] = dirname(__DIR__)."/php/phpPages/changePasswordPage.php";
        $parameters["js"] = array("../js/changePassword.js");
    }
    
    require dirname(__DIR__).'/php/phpPages/base.php';
?>