<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    if(isUserLoggedIn()){
        header("Location: ".ROOT."/php/index.php");
    }
    else{ /* If is not logged */
        $parameters["title"] = "Login - EventBook";
        $parameters["content"] = dirname(__DIR__)."/php/phpPages/loginPage.php";
        $parameters["js"] = array("../js/login.js", "../js/md5.js");
    }

    require dirname(__DIR__).'/php/phpPages/base.php';
?>