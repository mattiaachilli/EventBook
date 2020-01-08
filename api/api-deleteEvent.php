<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    require_once('../phpmailer/PHPMailerAutoload.php'); //includere la classe PHPMailerAutoload.php

    $response = 0;
    if (isset($_POST["eventToDelete"])) {
        $eventToDelete = $_POST["eventToDelete"];
        $event = $db->getEvent($eventToDelete)[0];
        $db->deleteEvent($eventToDelete);
        $users = $db->getUsersInEvent($eventToDelete);
        foreach($users as $mailUser) {
            sendMail($mailUser["Email"], $event);
        }
    } else {
        $response = "ID evento non settato.";
    }
    echo $response;


    function sendMail($mailUser, $event) {
        $mailReceiver = $mailUser;
        $subject = "EventBook - Evento annullato";
            $body = '<html>
                        <head></head>
                        <body>
                            <h1>EventBook - Evento annullato</h1>
                            <hr/>
                            <p>L\'evento '.$event["Nome_evento"].' che si terra\' a '.$event["Città_location"].' il '.$event["Data"].' 
                             per il quale hai acquistato i biglietti e\' stato annullato. Verrai rimborsato dell\'importo '
                            .'speso. <br/>Lo staff si scusa per il disagio.</p>
                        </body>
                    </html>';
                    require_once("../api/api-mailManager.php");
            $mail->send();
    }
?>