<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    $response = 0;
    if (isset($_POST["eventToDelete"])) {
        $db->deleteEvent($_POST["eventToDelete"]);
    } else {
        $response = "ID evento non settato.";
    }
    echo $response;
?>