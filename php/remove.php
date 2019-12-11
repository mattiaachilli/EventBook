<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    $active = 0;
    $db->updateUser($active);
    $modify = false;
    require("../api/api-sendModifyEmail.php");
    require(dirname(__DIR__)."/php/logout.php");
?>