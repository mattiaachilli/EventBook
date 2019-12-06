<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    if(isUserLoggedIn()){
        $parameters["title"] = "Cambia password - EventBook";
        $parameters["content"] = dirname(__DIR__)."/php/phpPages/changePasswordPage.php";
        $parameters["js"] = array("../js/changePassword.js", "../js/md5.js");
    } else {
        header("Location: ".ROOT."/php/index.php");
    }
    
    require dirname(__DIR__).'/php/phpPages/base.php';
?>