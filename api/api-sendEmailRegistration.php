<?php
    require_once('../phpmailer/PHPMailerAutoload.php');
    $mailReceiver = $_POST["email"];
    $user = $_POST["username"];
    $subject = "EventBook - Registrazione effettuata";
    require_once("../php/phpPages/bodyRegistration.php");
    require_once("../api/api-mailManager.php");
    if (!$mail->send()) {
        echo "Errore nell'invio della mail.";
    }
?>