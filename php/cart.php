<?php
    require_once("bootstrap.php");

    $parameters["title"] = "Carrello";
    $parameters["content"] = "phpPages/cartPage.php";
    $parameters["js"] = array("../js/cart.js");

    require 'phpPages\base.php';
?>