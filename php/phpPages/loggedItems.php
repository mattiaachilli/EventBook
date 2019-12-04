<?php 
    require_once("bootstrap.php");
?>
<a class = "dropdown-item text-primary" href="../php/adminApprovazione.php">Benvenuto <?php echo $_SESSION["user"][0]?></a>
<a class="dropdown-item text-primary" href="#">Modifica account</a>
<?php 
    switch($_SESSION["user"][1]){
        case USER:
            require_once('userListItem.php');
        break;
        case ORGANIZER:
            require_once('organizerListItem.php');
        break;
        case ADMIN:
            require_once('adminListItem.php');
        break;
    }
?>
<a class="dropdown-item text-primary" href="logout.php">Esci</a>