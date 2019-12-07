<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    if(isset($_POST["tickets"]) && isset($_POST["id"])) {
        $id = $_POST["id"];
        $n_ticket = $_POST["tickets"];
        $query = $db->getTicketsAvailable($id);
        if($n_ticket > $query[0]["Biglietti_disponibili"]) {
            echo 0;
        } else {
            setCookieCart($id, $n_ticket);
            echo 1;
        }
    }
?>