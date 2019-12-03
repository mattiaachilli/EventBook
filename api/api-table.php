<?php
    require_once '../php/bootstrap.php';
    $events = $db->getEvents();
    echo json_encode($events);
?>