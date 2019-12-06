<?php
    require_once(dirname(__DIR__)."/php/bootstrap.php");
    if(isset($_GET["categoria"]) && $_GET["categoria"] !== ""){
        $category = $db->getCategories($_GET["categoria"]);
        if(count($category) >= 1){
            echo "Categoria già presente";
        } else {
            $db->insertCategory($_GET["categoria"]);
            echo "Categoria inserita correttamente";
        }
    } else {
        echo "Campo vuoto non ammesso";
    }

?>