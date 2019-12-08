<?php
require_once(dirname(__DIR__)."/php/bootstrap.php");
if(isset($_POST["user"]) && isset($_POST["email"]) 
      && $_POST["user"] !== "" && $_POST["email"] !== ""){
        $check = $db->checkRegistration($_POST["user"], $_POST["email"]);
        if(count($check) >= 1 && $check[0]["username"] !== $_SESSION["user"][0]){
            if($check[0]["username"] === $_POST["user"]){
                echo "Username già in uso";
            } else {
                echo "Email già in uso";
            }
        } else {
            if(isset($_POST["password"]) && $_POST["password"] !== ""){
                $db->modifyUser($_POST["user"], $_POST["email"], $_POST["password"]);
            } else {
                $db->modifyUser($_POST["user"], $_POST["email"]);
            }
            $_SESSION["user"][0] = $_POST["user"];
            modifyCookie();
            echo "Modifica effettuata";
        }                         
    } else {
        echo "Questo campo non può essere vuoto";
    }
?>