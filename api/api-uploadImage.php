<?php
    $msg = 0;
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $imageName = '../img/events/'.$_FILES['image']['name'];
        if (file_exists($imageName)) {
            $i = 1;
            while (file_exists($imageName)) {
                $imageName = '../img/events/'.$i.' - '.$_FILES['image']['name'];
                $i++;
            }
        }
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $imageName)) {
            $msg = "File non presente, riprovare.";
        }
    }
    echo $msg;
?>