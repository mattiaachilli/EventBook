<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    require_once('../phpmailer/PHPMailerAutoload.php'); //includere la classe PHPMailerAutoload.php
    
    $response = 0;
    
    if(isset($_POST["mail"])) {
        $mailReceiver = $_POST["mail"];
        $user = $db->checkMailExists($mailReceiver);

        if (count($user) == 1) {
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $password = substr(str_shuffle($permitted_chars), 0, 8);
            $subject = "EventBook - Cambio password";
            $body = '<html>
                        <head></head>
                        <body>
                            <h1>EventBook - Cambio Password</h1>
                            <hr/>
                            <p>Questa e\' la tua nuova password per accedere su EventBook: <b>'.$password.'.</b><br>
                            Potrai cambiarla in qualsiasi momento nella sezione apposita del tuo account.<br><br>
                            Saluti dallo staff di EventBook</p>
                        </body>
                    </html>';
            require_once("../api/api-mailManager.php");
            if (!$mail->send()) { //mandare la mail
                $response = "Errore nell'invio della mail.";
            } else {
                $db->changePassword($user[0]["Username"], md5($password));
            }
        } else {
            $response = "Non esiste alcun account legato a questa mail.";
        }
    } else {
        $response = "Mail non inserita.";
    }
    echo $response;
?>