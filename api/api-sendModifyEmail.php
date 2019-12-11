<?php
    require_once('../phpmailer/PHPMailerAutoload.php');
    $mailReceiver = $_POST["email"];
    $user = $_POST["user"];
    $subject = "EventBook - Modifica delle credenziali";
    $body = '<html>
                <head></head>
                <body>
                    <h1>EventBook - Ciao '.$user.'</h1>
                    <hr/>
                    <p>Le tue credenziali sono state correttamente aggiornate<br>
                    Username: '.$user.';<br>
                    Email: '.$mailReceiver.';<br><br>
                    Saluti dallo staff di EventBook!!</p>
                </body>
            </html>';
    require_once("../api/api-mailManager.php");
    if (!$mail->send()) {
        echo "Errore nell'invio della mail.";
    }
?>