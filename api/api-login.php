<?php
    require_once("../php/bootstrap.php");
    if(isset($_POST["username"]) && isset($_POST["password"])){
        $login = $db->checkLogin($_POST["username"], $_POST["password"]);
        if(count($login) == 0){
            echo 0;
        } else {
            registerLoggedUser($login[0]);
            echo 1;
        }
    }
?>