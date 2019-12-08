<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    if(isset($_COOKIE["cart"]) && !empty($_COOKIE["cart"]) && isset($_POST["id_event"])) {
        $found = 0;
        $id = $_POST["id_event"];
        $arr = json_decode($_COOKIE["cart"]);
        for($i = 0; $i < count($arr); $i++) {
            if($i % 2 == 0 || $i == 0) {
                if($id == $arr[$i]) {
                    break;
                }
            }
        }
        if($i < count($arr)) {
            unset($arr[$i]);
            unset($arr[++$i]);
            setcookie("cart", json_encode($arr), time() + 3600 * 24 * 365, "/"); 
            if(count($arr) == 0) {
                setcookie("cart", null, -1, "/");
            }
            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo 2;
    }
?>