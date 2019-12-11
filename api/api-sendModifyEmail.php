<?php
    require_once('../phpmailer/PHPMailerAutoload.php');
    if(isset($_POST["email"]) && isset($_POST["user"])){
        $mailReceiver = $_POST["email"];
        $user = $_POST["user"];
        $subject = "EventBook - Modifica delle credenziali";
    } else {
        $userLogged = $db->getUser();
        $mailReceiver = $userLogged[0]["Email"];
        $user = $_SESSION["user"][0];
        $subject = "EventBook - Disattivazione account";
    }
    if($modify === true){
        require_once("../php/phpPages/bodyModify.php");
    } else {
        require_once("../php/phpPages/bodyElimina.php");
    }
    require_once("../api/api-mailManager.php");
    if (!$mail->send()) {
        echo "Errore nell'invio della mail.";
    }
?>