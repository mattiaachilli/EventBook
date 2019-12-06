<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    session_destroy();

    if(isset($_COOKIE["user"]) && !empty($_COOKIE["user"])) {
        setcookie("user", null, -1, "/");
    }

    unset($_SESSION["user"]);
    header("Location: ".ROOT."/php/index.php");
?>