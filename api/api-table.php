<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    $events = $db->getEvents();
    echo json_encode($events);
?>