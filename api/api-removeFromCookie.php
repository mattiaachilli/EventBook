<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    if(isset($_COOKIE["cart"]) && !empty($_COOKIE["cart"]) && isset($_POST["id_event"])) {
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
    } else {
        echo 2;
    }
?>