<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    if(isUserLoggedIn()) {
        $cookie = $_SESSION["user"][0]."Cart";
    }
    if(isset($_COOKIE[$cookie]) && !empty($_COOKIE[$cookie]) && isUserLoggedIn() && typeOfUserLogged() == USER) {
        require_once('../phpmailer/PHPMailerAutoload.php');
        $queryMail = $db->getUser();
        $mailReceiver = $queryMail[0]["Email"];
        $user = $_SESSION["user"][0];
        $arr = json_decode($_COOKIE[$cookie]);
        $subject = "EventBook - Ordine acquistato";
        $body = '<html>
                    <head></head>
                    <body>
                        <h1>EventBook - Salve '.$user.' il suo ordine è stato acquistato con successo</h1>
                        <hr/>
                        <h2> Riepilogo ordine </h2> <br>
                        <p>';
                        for($i = 1 ; $i < count($arr); $i += 3) {
                            $data = $db->getEvent($arr[$i]);
                            $quantità = $arr[$i + 1];
                            $body .= "Evento: ". $data[0]["Nome_evento"].", Location: ".$data[0]["Nome_location"].", Data: ".$data[0]["Data"]. ", quantità: ".$quantità.' <br>';
                            $body .= "Totale: ". $data[0]["Prezzo"] * $quantità. ",00€ <br><br>";
                        }
                        $body .='
                        </p>
                    </body>
                </html>';
        require_once("../api/api-mailManager.php");
        if (!$mail->send()) {
            echo "Errore nell'invio della mail.";
        }
        unset($_COOKIE[$cookie]);
        setcookie($cookie, null, -1, "/");
        header("Location: ".ROOT."/php/orders.php");
    } else {
        header("Location: ".ROOT."/php/index.php");
    }
?>