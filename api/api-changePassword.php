<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    if(isset($_POST["newPassword"]) && isset($_POST["repeatPassword"])) {
        $db->changePassword("MattSaber", $_POST["newPassword"]); //user provvisorio
        echo 1;
    }
?>