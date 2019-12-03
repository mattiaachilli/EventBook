<?php
    require '../php/bootstrap.php';
    if(isset($_POST["username"]) && isset($_POST["email"])){
        $check = $db->checkRegistration($_POST["username"], $_POST["email"]);
        if(count($check) >= 1){
            echo 0;
        } else {
            $db->registerUser($_POST["username"], $_POST["email"], $_POST["nome"], $_POST["cognome"], $_POST["password"], $_POST["organizzatore"]);
            registerUser($_POST["username"]);
            echo 1;
        }
    }
?>