<?php
<<<<<<< HEAD
    require_once(dirname(__DIR__)."/php/bootstrap.php");
=======
    require '../php/bootstrap.php';
    $error = true;
>>>>>>> bd81a0a3b9aeeaa0246553676ad1ac1a251ca279
    if((isset($_POST["username"]) 
        && isset($_POST["email"]) 
        && isset($_POST["nome"]) 
        && isset($_POST["cognome"])
        && isset($_POST["password"])
        && isset($_POST["confermaPassword"])) && ($_POST["username"] !== "" 
                                            && $_POST["email"] !== "" 
                                            && $_POST["nome"] !== ""
                                            && $_POST["cognome"] !== ""
                                            && $_POST["password"] !== ""
                                            && $_POST["confermaPassword"] !== "")){
        if($_POST["password"] === $_POST["confermaPassword"]){
            $check = $db->checkRegistration($_POST["username"], $_POST["email"]);
            if(count($check) >= 1){
                if($check[0]["username"] === $_POST["username"]){
                    if(isAjaxRequest()){
                        echo "Username già in uso";
                    } else {
                        $parameters["userError"] = "Username già in uso";
                    }
                } else {
                    if(isAjaxRequest()){
                        echo "Email già in uso";
                    } else {
                        $parameters["emailError"] = "Campo vuoto";
                    }
                }
            } else {
                if(isset($_POST["organizzatore"])){
                    $organizzatore = 1;
                } else {
                    $organizzatore = 0;
                }
                $db->registerUser($_POST["username"], $_POST["email"], $_POST["nome"], $_POST["cognome"], $_POST["password"], $organizzatore);
                registerLoggedUser($_POST["username"], 1, $organizzatore);
                if(isAJaxRequest()){
                    echo "User registrato";
                } else {
                    $error = false;
                    header("Location:".ROOT."/php/index.php");
                }
            }
        } else {
            if(isAjaxRequest()){
                echo "Questi campi devono essere uguali";
            } else {
                $parameters["pswError"] = "Questi campi devono essere uguali";
            }
        }
    } else {
        if(isAjaxRequest()){
            echo "Campo vuoto";
        } else {
            $parameters["error"] = "Non tutti i campi sono stati settati";
            $parameters["userError"] = "Non tutti i campi sono stati settati";
            $parameters["emailError"] = "Non tutti i campi sono stati settati";
            $parameters["pswError"] = "Non tutti i campi sono stati settati";   
        }
    }
    if($error === true){
        require dirname(__DIR__)."/php/registration.php";
    }
?>