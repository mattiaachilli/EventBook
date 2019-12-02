<?php
    require_once("../php/bootstrap.php");
    if(isset($_POST["newPassword"]) && isset($_POST["repeatPassword"])) {
        $db->changePassword("MattSaber", $_POST["newPassword"]); //user provvisorio
        echo 1;
    }
?>