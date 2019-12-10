<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    if(!isUserLoggedIn() || isUserLoggedIn() && (typeOfUserLogged() == USER || typeOfUserLogged() == ORGANIZER)) {
        $currentID = 0;
        $nextOrPrev = 0;
        if (isset($_GET["maxID"])) {
            $currentID = $_GET["maxID"];
            $nextOrPrev = 0;
        }
        if (isset($_GET["minID"])) {
            $currentID = $_GET["minID"];
            $nextOrPrev = 1;
        }
        if(isset($_GET["search"])){
            $str = $_GET["search"];
        }
        $parameters["title"] = "Eventi cercati - EventBook";
        $parameters["events"] = $db->searchingEvent($str, $currentID, $nextOrPrev);
        $parameters["content"] = dirname(__DIR__)."/php/phpPages/searchingPage.php";
        /*$strings = array();
        $word = "";
        array_push($strings, strtok($_GET["search"], " \n\t"));
        while($word !== false){
            $word = strtok(" \n\t");
            array_push($strings, $word);
        }*/
        /*foreach($strings as $token){
            if(strlen($token) > 0){
                $parameters["events"] = $db->searchingEvent($token, $currentID, $nextOrPrev);
            }
        }*/
    } else {
        header("Location: ".ROOT."/php/index.php");
    }
    
    require dirname(__DIR__).'/php/phpPages/base.php';
?>