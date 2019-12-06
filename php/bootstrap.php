<?php
    session_start();
    require_once("../utils/functions.php");
    require_once("../db/database.php");
    $db = new Database("localhost", "root", "", "eventbook");
    setSessionFromCookie();
    /* CONSTANTS FOR TYPE OF USER */
    define("USER", 0);
    define("ORGANIZER", 1);
    define("ADMIN", 2);
    /* DEFAULT HTTP */
    define("ROOT", "http://".$_SERVER['HTTP_HOST']."/progetto-tec.-web");
?>