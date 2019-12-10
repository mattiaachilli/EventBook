<?php
require_once('../phpmailer/PHPMailerAutoload.php');
$organizzatore = $db->getUSer($_POST["organizzatore"]);
$mailReceiver = $organizzatore[0]["Email"];
$username = $_POST["organizzatore"];
$evento = $_POST["evento"];
if($_POST["scelta"] == 1){
    $subject = "EventBook - Approvazione '.$evento.'";
    $body = '<html>
                <head></head>
                <body>
                    <h1>EventBook - Hei organizzatore</h1>
                    <hr/>
                    <p>Lo staff di EventBook comunica l\' accettazione della proposta di evento.<br>
                    '.$username.' la proposta per '.$evento.' e\' stata esaminata ed accettata.<br>
                    Saluti dallo staff di EventBook.</p>
                </body>
            </html>';
} else {
    $subject = "EventBook - Rifiutato '.$evento.'";
    $body = '<html>
                <head></head>
                <body>
                    <h1>EventBook - Hei organizzatore</h1>
                    <hr/>
                    <p>Lo staff di EventBook comunica il rifiuto della proposta di evento.<br>
                    Ci dispiace '.$username.', ma la proposta per '.$evento.' e\' stata esaminata e rifiutata.<br>
                    Saluti dallo staff di EventBook.</p>
                </body>
            </html>';
}
require_once("../api/api-mailManager.php");
if (!$mail->send()) {
    echo "Errore nell'invio della mail.";
}

?>