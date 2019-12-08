<?php 
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    if(!isUserLoggedIn()){
        echo 0;
    } else {
        if(isset($_COOKIE["cart"]) && !empty($_COOKIE["cart"])) {
            $return = $db->insertTicket($_SESSION["user"][0], json_decode($_COOKIE["cart"]));
            if($return == 1) {
                setcookie("cart", null, -1, "/");
                echo 1;
            } else {
                $arr = array();
                $arr = $return;
                foreach ($arr as $id => $quantity){  
                    $event = $db->getEvent($id);
                    echo "Per l'evento: ".$event[0]["Nome_evento"]; 
                    if($quantity > 0) {
                        echo " sono rimasti solamente: ".$quantity. " biglietti";
                    } else {
                        echo "sono finiti tutti i biglietti";
                    }
                }  
            }
        } else {
            echo 2;
        }
    }
?>