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

    function modifyCookie(){
        if(isset($_COOKIE["user"]) && !empty($_COOKIE["user"])){
            setcookie("user", json_encode($_SESSION["user"]), time() + 3600 * 24 * 365, "/");
        }
    }

    function setCookieCart($id, $n_ticket, $change) {
        if(!isset($_COOKIE["cart"])) {
            $array = array($id, $n_ticket);
            setcookie("cart", json_encode($array), time() + 3600 * 24 * 365, "/"); 
        } else {
            $arr = json_decode($_COOKIE["cart"]);
            $found = 0;
            for($i = 0; $i < count($arr) && !$found; $i+=2) {
                if($arr[$i] == $id) {
                    if(!$change) {
                        $arr[++$i] += $n_ticket;
                    } else {
                        $arr[++$i] = $n_ticket;
                    }
                    $found = 1;
                }
            }
            if(!$found) {
                array_push($arr, $id, $n_ticket);
            }
            setcookie("cart", json_encode($arr), time() + 3600 * 24 * 365, "/"); 
        }
    }

    function setUserCookieCart($id, $n_ticket, $change , $user = "") {
        if(isset($_SESSION["user"][0])) {
            $cookie = $_SESSION["user"][0]."Cart";
        } else {
            $cookie = $user."Cart";
        }
        if(!isset($_COOKIE[$cookie])) {
            $array = array($_SESSION["user"][0], $id, $n_ticket); //Add username to cookie
            setcookie($cookie, json_encode($array), time() + 3600 * 24 * 365, "/"); 
        } else {
            $arr = json_decode($_COOKIE[$cookie]);
            $found = 0;
            for($i = 1; $i < count($arr) && !$found; $i+=3) {
                if($arr[$i] == $id) {
                    if(!$change) {
                        $arr[++$i] += $n_ticket;
                    } else {
                        $arr[++$i] = $n_ticket;
                    }
                    $found = 1;
                }
            }
            if(!$found) {
                array_push($arr, $_SESSION["user"][0], $id, $n_ticket);
            }
            setcookie($cookie, json_encode($arr), time() + 3600 * 24 * 365, "/"); 
        }
    }

    function mergeCookie($user) {
        if(typeOfUserLogged() == USER) {
            if(isset($_COOKIE["cart"]) && !empty($_COOKIE["cart"])) {
                $arr = json_decode($_COOKIE["cart"]);
                for($i = 0; $i < count($arr); $i+=2) {
                    setUserCookieCart($arr[$i], $arr[$i + 1], 0, $user);
                }
                setcookie("cart", null, -1, "/");
            }
        }
    }
?>