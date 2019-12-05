<?php
    require_once("../php/bootstrap.php");
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
                if(isAjaxRequest()) {
                    $code = 0;
                } else {
                    $msg = "Username/Email o Password incorretti";
                }
            } else if ($login[0]["Organizzatore"] == 1){
                registerLoggedUser($login[0]["Username"], $checkbox, 1);
                if(isAjaxRequest()) {
                    $code = 2;
                } else {
                    header("Location:".ROOT."/php/newEvent.php");
                }
            } else {
                registerLoggedUser($login[0]["Username"], $checkbox);
                if ($login[0]["Username"] == "Admin") {
                    if(isAjaxRequest()) {
                        $code = 3;
                    } else {
                        header("Location:".ROOT."/php/adminApprovazione.php");
                    }
                } else {
                    if(isAjaxRequest()) {
                        $code = 1;
                    } else {
                        header("Location:".ROOT."/php/index.php");
                    }
                }
            } 
        } else {
            $msg = "Compilare tutti i campi!";
        }
        if(isAjaxRequest()) {
            echo $code;
        } else {
            if(isset($msg)) {
                $parameters["error"] = $msg;
                require dirname(__DIR__)."/php/login.php";
            }
        }
    } else {
        header("Location: ".ROOT."/php/index.php");
    }
?>