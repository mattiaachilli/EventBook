<?php
    require_once("../php/bootstrap.php");

    $msg = 0;
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        if ($_FILES['image']['size'] > 1073741824) {
            $msg = 1;
        }
        list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);
        if ($width != $height) {
            $msg = 2;
        }
        if (($type!=1) && ($type!=2) && ($type!=3)) {
            $msg = 3;
        }
        if ($msg == 0) {
            if (!move_uploaded_file($_FILES['image']['tmp_name'], '../img/events/'.$_FILES['image']['name'])) {
                $msg = 5;
            }
        }
    }

  echo $msg;

?>