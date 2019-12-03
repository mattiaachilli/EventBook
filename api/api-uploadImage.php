<?php
    require_once("../php/bootstrap.php");

    $msg = 0;
    do {
        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        // Controllo che il file non superi i 10 MB
            if ($_FILES['image']['size'] > 1073741824) {
                $msg = 1;
                break;
            }
            // Ottengo le informazioni sull'immagine
            list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);
            // Controllo che l'immagine sia quadrata
            if ($width != $height) {
                $msg = 2;
                break;
            }
            // Controllo che il file sia in uno dei formati GIF, JPG o PNG
            if (($type!=1) && ($type!=2) && ($type!=3)) {
                $msg = 3;
                break;
            }
            // Verifico che sul sul server non esista già un file con lo stesso nome
            // In alternativa potrei dare io un nome che sia funzione della data e dell'ora
            if (file_exists('../img/events/'.$_FILES['image']['name'])) {
                $msg = 4;
                break;
            }
            // Sposto il file nella cartella da me desiderata
            if (!move_uploaded_file($_FILES['image']['tmp_name'], '../img/events/'.$_FILES['image']['name'])) {
                $msg = 5;
                break;
            }
            
        }
    } while (false);
  echo $msg;

?>