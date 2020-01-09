<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
        
    if(isUserLoggedIn() && typeOfUserLogged() == ORGANIZER) {
        $parameters["title"] = "Nuovo evento - EventBook";
        $parameters["content"] = dirname(__DIR__)."/php/phpPages/newEventPage.php";
        $parameters["js"] = array("../js/newEvent.js", "../js/datepicker.js");
        $parameters["datePicker"] = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>';
    } else {
        header("Location: index.php");
    }
    
    require dirname(__DIR__).'/php/phpPages/base.php';
?>