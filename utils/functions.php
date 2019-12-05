<?php
    function typeOfUserLogged() {
        if(isUserLoggedIn()) {
            return $_SESSION["user"][1];
        }
    }

    function isUserLoggedIn(){
        return !empty($_SESSION["user"]);
    }

    function registerLoggedUser($user, $checkbox, $organizer = -1){
        $array_session = array($user);
        if($organizer == 1) {
            array_push($array_session, ORGANIZER);
        } else if($user == "Admin") {
            array_push($array_session, ADMIN);
        } else {
            array_push($array_session, USER);
        }
        if($checkbox == 1) {
            setcookie("user", json_encode($array_session), time() + 3600 * 24 * 365, "/"); 
        }
        $_SESSION["user"] = $array_session;
    }

    function setSessionFromCookie() {
        if(!empty($_COOKIE["user"]) && empty($_SESSION["user"])) {
            $_SESSION["user"] = json_decode($_COOKIE["user"], true);
        }
    }

    function isAjaxRequest() {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
                strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
    }
?>