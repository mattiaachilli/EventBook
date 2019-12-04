<?php
    require_once("bootstrap.php");

    if(!isUserLoggedIn() || isUserLoggedIn() && typeOfUserLogged() == USER) {
        $parameters["title"] = "Carrello";
        $parameters["content"] = "phpPages/cartPage.php";
        $parameters["js"] = array("../js/cart.js");
    } else {
        header("Location: index.php");
    }

    require 'phpPages\base.php';
?>