<?php
    require_once("../php/bootstrap.php");
    
    $response = 1;
    
    if(isset($_POST["mail"]) && isset($_POST["randomPassword"])) {
        $user = $db->checkMailExists($_POST["mail"]);
        if (count($user) == 1) {
            $db->changePassword($user[0]["Username"], $_POST["randomPassword"]);
        } else {
            $response = 0;
        }
    } else {
        $response = 0;
    }
    echo $response;
?>