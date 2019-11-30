<?php
    function isUserLoggedIn(){
        return !empty($_SESSION["user"]);
    }

    function registerLoggedUser($user){
        $_SESSION["user"] = $user["Username"];
    }
?>