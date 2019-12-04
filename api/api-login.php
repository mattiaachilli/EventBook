<?php
    require_once("../php/bootstrap.php");
    if(isset($_POST["username"]) && isset($_POST["password"])){
        $login = $db->checkLogin($_POST["username"], $_POST["password"]);
        if(count($login) == 0){
            echo 0;
        } else if ($login[0]["Organizzatore"] == 1){
            registerLoggedUser($login[0]["Username"], $_POST["checkbox"], 1);
            echo 2;
        } else {
            registerLoggedUser($login[0]["Username"], $_POST["checkbox"]);
            if ($login[0]["Username"] == "Admin") {
                echo 3;
            }
            echo 1;
        } 
    }
?>