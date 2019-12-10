<?php
    require_once('../phpmailer/PHPMailerAutoload.php');
    $mailReceiver = $_POST["email"];
    $user = $_POST["username"];
    $subject = "EventBook - Registrazione effettuata";
    $body = '<html>
                <head></head>
                <body>
                    <h1>EventBook - Benvenuto '.$user.'</h1>
                    <hr/>
                    <p>Lo staff ha il piacere di accoglierti su EventBook!<br>
                    Username: '.$user.';<br>
                    Email: '.$mailReceiver.';<br>
                    Potrai cambiare queste credenziali e la tua password in qualsiasi momento nella sezione apposita del tuo account.<br><br>
                    Saluti dallo staff di EventBook</p>
                </body>
            </html>';
    require_once("../api/api-mailManager.php");
    if (!$mail->send()) {
        echo "Errore nell'invio della mail.";
    }
?>