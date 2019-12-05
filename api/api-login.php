<?php
    require_once("../php/bootstrap.php");
    $code = 0;
    if(isset($_POST["username"]) && isset($_POST["password"]) 
        && 
        !empty($_POST["username"]) && !empty($_POST["password"])){
        $login = $db->checkLogin($_POST["username"], $_POST["password"]);
        $checkbox = 0;
        if(isset($_POST["checkbox"]) && $_POST["checkbox"] == 1) {
            $checkbox = 1;
        }
        if(count($login) == 0){
            if(isAjaxRequest()) {
                echo 0;
            }
        } else if ($login[0]["Organizzatore"] == 1){
            registerLoggedUser($login[0]["Username"], $checkbox, 1);
            echo 2;
        } else {
            registerLoggedUser($login[0]["Username"], $checkbox);
            if ($login[0]["Username"] == "Admin") {
                echo 3;
            } else {
                echo 1;
            }
        } 
    }

?>