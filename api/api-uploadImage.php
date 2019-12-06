<?php
    $msg = 0;
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        if (!move_uploaded_file($_FILES['image']['tmp_name'], '../img/events/'.$_FILES['image']['name'])) {
            $msg = "File non presente, riprovare.";
        }
    }
    echo $msg;
?>