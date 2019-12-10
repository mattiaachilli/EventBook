<?php 
require '../php/bootstrap.php';

if(isset($_POST["evento"]) && isset($_POST["organizzatore"]) && isset($_POST["id"]) && isset($_POST["scelta"])){
    $db->updateEvents($_POST["id"], $_POST["scelta"]);
    if($_POST["scelta"] == 1){
        echo "Evento accettato";
    } else {
        echo "Evento rifiutato"; 
    }
    require("api-sendApprovationEmail.php");
} else {
    echo "Errore"; 
}
?>