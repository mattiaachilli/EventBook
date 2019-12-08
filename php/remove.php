<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    $db->removeUser();
    require(dirname(__DIR__)."/php/logout.php");
?>