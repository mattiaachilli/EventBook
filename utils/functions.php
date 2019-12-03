<?php
    function isUserLoggedIn(){
        return !empty($_SESSION["user"]);
    }

    function registerLoggedUser($user, $checkbox){
        $_SESSION["user"] = $user["Username"];
        if($checkbox == 1) {
            setcookie("user", $user["Username"], time() + 3600 * 24 * 365, "/"); 
        }
    }

    function registerUser($user){
        $_SESSION["user"] = $user;
    }

    function setSessionFromCookie() {
        if(!empty($_COOKIE["user"]) && empty($_SESSION["user"])) {
            $_SESSION["user"] = $_COOKIE["user"];
        }
    }
?>