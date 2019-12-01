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

    function setSessionFromCookie() {
        if(isset($_COOKIE["user"]) && empty($_SESSION["user"])) {
            $_SESSION["user"] = $_COOKIE["user"];
        }
    }
?>