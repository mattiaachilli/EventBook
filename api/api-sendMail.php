<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    require_once('../phpmailer/PHPMailerAutoload.php'); //includere la classe PHPMailerAutoload.php
    
    $response = 0;
    
    if(isset($_POST["mail"])) {
        $user = $db->checkMailExists($_POST["mail"]);
        if (count($user) == 1) {
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $password = substr(str_shuffle($permitted_chars), 0, 8);
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
            $mail = new PHPMailer(); //creare un istanza di PHPMailer
            $mail->Host = "smtp.gmail.com"; //Settare l'host
            $mail->isSMTP(); //Abilitare SMTP
            $mail->SMTPAuth = true; //Settare l'autenticazione a true
            $mail->Username = "eventbook00@gmail.com"; //Settare i dettagli di login per l'account GMAIL
            $mail->Password = "ciaoraga12";
            $mail->SMTPSecure = "ssl"; //Tipo di protezione
            $mail->Port = 465; //Settare una porta
            $mail->Subject = "EventBook - Cambio password"; //Settare l'oggetto
            $mail->isHTML(true); //va messo solo se si scrive la mail in HTML
            $mail->Body = $body;  //Settare il corpo della mail
            $mail->setFrom('eventbook00@gmail.com', 'EventBook'); //settare chi sta mandando la mail
            $mail->addAddress($_POST["mail"]); //settare il destinatario

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