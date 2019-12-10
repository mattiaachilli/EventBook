<?php 
    $mail = new PHPMailer(); //creare un istanza di PHPMailer
    $mail->Host = "smtp.gmail.com"; //Settare l'host
    $mail->isSMTP(); //Abilitare SMTP
    $mail->SMTPAuth = true; //Settare l'autenticazione a true
    $mail->Username = "eventbook00@gmail.com"; //Settare i dettagli di login per l'account GMAIL
    $mail->Password = "ciaoraga12";
    $mail->SMTPSecure = "ssl"; //Tipo di protezione
    $mail->Port = 465; //Settare una porta
    $mail->Subject = $subject; //Settare l'oggetto
    $mail->isHTML(true); //va messo solo se si scrive la mail in HTML
    $mail->Body = $body; //Settare il corpo della mail
    $mail->setFrom('eventbook00@gmail.com', 'EventBook'); //settare chi sta mandando la mail
    $mail->addAddress($mailReceiver); //settare il destinatario
?>