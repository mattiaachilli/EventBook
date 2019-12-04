<?php
    require_once("bootstrap.php");
    session_destroy();

    if(isset($_COOKIE["user"]) && !empty($_COOKIE["user"])) {
        setcookie("user", null, -1, "/");
    }

    unset($_SESSION["user"]);
    require 'index.php';
?>