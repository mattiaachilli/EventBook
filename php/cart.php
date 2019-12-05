<?php
    require_once("bootstrap.php");

    if(!isUserLoggedIn() || isUserLoggedIn() && typeOfUserLogged() == USER) {
        $parameters["title"] = "Carrello";
        $parameters["content"] = dirname(__DIR__)."/php/phpPages/cartPage.php";
        $parameters["js"] = array("../js/cart.js");
    } else {
        header("Location: ".ROOT."/php/index.php");
    }

    require dirname(__DIR__).'/php/phpPages/base.php';
?>