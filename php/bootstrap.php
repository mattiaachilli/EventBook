<?php
    session_start();
    require_once("../utils/functions.php");
    require_once("../db/database.php");
    $db = new Database("localhost", "root", "", "eventbook");
?>