<?php
    $strings = array();
    $word = "";
    array_push($strings, strtok($_GET["search"], " \n\t"));
    while($word !== false){
        $word = strtok(" \n\t");
        array_push($strings, $word);
    }
    foreach($strings as $token){
        echo($token." ");
    }
?>