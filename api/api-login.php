<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    if(!isUserLoggedIn()) {
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
                $code = 0;
            } else if ($login[0]["Organizzatore"] == 1){
                registerLoggedUser($login[0]["Username"], $checkbox, 1);
                $code = 2;
            } else {
                registerLoggedUser($login[0]["Username"], $checkbox);
                if ($login[0]["Username"] == "Admin") {
                    $code = 3;
                } else {
                    $code = 1;
                }
            } 
        }
        echo $code;
    } else {
        header("Location: ".ROOT."/php/index.php");
    }
?>