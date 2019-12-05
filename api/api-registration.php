<?php
    require '../php/bootstrap.php';
    if((isset($_POST["username"]) 
        && isset($_POST["email"]) 
        && isset($_POST["nome"]) 
        && isset($_POST["cognome"])
        && isset($_POST["password"])
        && isset($_POST["confermaPassword"]) 
        && isset($_POST["organizzatore"])) && ($_POST["username"] !== "" 
                                            && $_POST["email"] !== "" 
                                            && $_POST["nome"] !== ""
                                            && $_POST["cognome"] !== ""
                                            && $_POST["password"] !== ""
                                            && $_POST["confermaPassword"] !== ""
                                            && $_POST["organizzatore"] !== "")){
        if($_POST["password"] === $_POST["confermaPassword"]){
            $check = $db->checkRegistration($_POST["username"], $_POST["email"]);
            if(count($check) >= 1){
                if($check[0]["username"] === $_POST["username"]){
                    echo 0;
                } else {
                    echo 4;
                }
            } else {
                $db->registerUser($_POST["username"], $_POST["email"], $_POST["nome"], $_POST["cognome"], $_POST["password"], $_POST["organizzatore"]);
                registerLoggedUser($_POST["username"], 1, $_POST["organizzatore"]);
                echo 1;
            }
        } else {
            echo 3;
        }
    } else {
        echo 2;
    }
?>