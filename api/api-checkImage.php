<?php
    $msg = 0;
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);
        if ($_FILES['image']['size'] > 1073741824) {
            $msg = "L'immagine è troppo grande (max. 10 MB).";
        } else if ($width != $height) {
            $msg = "L'immagine deve essere quadrata.";
        } else if (($type!=1) && ($type!=2) && ($type!=3)) {
            $msg = "Formati supportati: .jpg, .png, .gif.";
        } else if (file_exists("../img/events/".$_FILES['image']['name'])){
            $msg = "L'immagine esiste già con questo nome, rinominarla.";
        }
    }
    echo $msg;
?>