<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    $strings = array();
    $word = "";
    array_push($strings, strtok($_GET["search"], " \n\t"));
    while($word !== false){
        $word = strtok(" \n\t");
        array_push($strings, $word);
    }
    foreach($strings as $token){
        if(strlen($token) > 0){
            $result = $db->searchingEvent($token);
            var_dump($result);
        }
    }
?>