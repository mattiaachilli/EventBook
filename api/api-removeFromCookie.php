<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    if(isset($_COOKIE["cart"]) && !empty($_COOKIE["cart"]) && isset($_POST["id_event"]) && !isUserLoggedIn()) {
        $found = false;
        $id = $_POST["id_event"];
        $arr = json_decode($_COOKIE["cart"]);
        for($i = 0; $i < count($arr); $i++) {
            if($i == 0 || $i % 2 == 0) {
                if($id == $arr[$i]) {
                    $found = true;
                    break;
                }
            }
        }
        if($found) {
            unset($arr[$i]);
            unset($arr[++$i]);
            $arr2 = array_values($arr); // 'reindex' array
            setcookie("cart", json_encode($arr2), time() + 3600 * 24 * 365, "/");
            if(count($arr2) == 0) {
                unset($_COOKIE["cart"]);
                setcookie("cart", null, -1, "/");
            }
            echo 1;
        } else {
            echo 0;
        }
    } else if(isUserLoggedIn()) {
        $cookie = $_SESSION["user"][0]."Cart";
        if(isset($_COOKIE[$cookie]) && !empty($_COOKIE[$cookie]) && isset($_POST["id_event"])) {
            $found = false;
            $id = $_POST["id_event"];
            $arr = json_decode($_COOKIE[$cookie]);
            for($i = 1; $i < count($arr); $i+=3) {
                if($id == $arr[$i]) {
                    $found = true;
                    break;
                }
            }
            if($found) {
                unset($arr[$i - 1]);
                unset($arr[$i]);
                unset($arr[++$i]);
                $arr2 = array_values($arr); // 'reindex' array
                setcookie($cookie, json_encode($arr2), time() + 3600 * 24 * 365, "/");
                if(count($arr2) == 0) {
                    unset($_COOKIE[$cookie]);
                    setcookie($cookie, null, -1, "/");
                }
                echo 1;
            } else {
                echo 0;
            }
        }
    } else {
        echo 2;
    }
?>