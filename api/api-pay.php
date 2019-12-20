<?php 
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    if(!isUserLoggedIn()){
        echo 0;
    } else {
        $cookie = $_SESSION["user"][0]."Cart";
        if(isset($_COOKIE[$cookie]) && !empty($_COOKIE[$cookie])) {
            $return = $db->insertTicket($_SESSION["user"][0], json_decode($_COOKIE[$cookie]));
            if($return == 1) {
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