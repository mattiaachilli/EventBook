<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    if(isset($_POST["newPassword"]) && isset($_POST["repeatPassword"])) {
        $db->changePassword($_SESSION["user"][0], $_POST["newPassword"]); 
        echo 0;
    } 
?>