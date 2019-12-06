<?php 
    require_once(dirname(__DIR__)."/php/bootstrap.php");

    echo isUserLoggedIn() ? 1 : 0;

?>