<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    $active = 0;
    $db->updateUser($active);
    require(dirname(__DIR__)."/php/logout.php");
?>