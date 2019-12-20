<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    if(isset($_POST["tickets"]) && isset($_POST["id"])) {
        $id = $_POST["id"];
        $n_ticket = $_POST["tickets"];
        $query = $db->getTicketsAvailable($id);
        if($n_ticket > $query[0]["Biglietti_disponibili"]) {
            echo 0;
        } else {
            $change = 0;
            if(isset($_POST["change"])) {
                $change = 1;
            }
            if(!isUserLoggedIn()) {
                setCookieCart($id, $n_ticket, $change);
            } else {
                setUserCookieCart($id, $n_ticket, $change);
            }
            echo 1;
        }
    }
?>