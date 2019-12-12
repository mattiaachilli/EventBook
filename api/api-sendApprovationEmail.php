<?php
require_once('../phpmailer/PHPMailerAutoload.php');
$organizzatore = $db->getUSer($_POST["organizzatore"]);
$mailReceiver = $organizzatore[0]["Email"];
$username = $_POST["organizzatore"];
$evento = $_POST["evento"];
if($_POST["scelta"] == 1){
    $subject = "EventBook - Approvazione '.$evento.'";
    require_once("../php/phpPages/bodyApprovation.php");
} else {
    $subject = "EventBook - Rifiutato '.$evento.'";
    require_once("../php/phpPages/bodyRefuse.php");
}
require_once("../api/api-mailManager.php");
if (!$mail->send()) {
    echo "Errore nell'invio della mail.";
}

?>