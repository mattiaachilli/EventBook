<?php
    require_once("../php/bootstrap.php");
    if(isset($_POST["username"]) && isset($_POST["password"])){
        $login = $db->checkLogin($_POST["username"], $_POST["password"]);
        if(count($login) == 0){
            echo 0;
        } else {
            $checkbox = 0;
            if(isset($_POST["checkbox"]) && $_POST["checkbox"] == 1) {
                $checkbox = 1;
            }
            registerLoggedUser($login[0], $checkbox);
            echo 1;
        }
    }
?>