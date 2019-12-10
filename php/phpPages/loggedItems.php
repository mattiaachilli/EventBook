<?php 
    require_once("bootstrap.php");
?>
    <a class = "dropdown-item text-primary" href="../php/adminApprovazione.php">Benvenuto <?php echo $_SESSION["user"][0]?></a>
<?php if($_SESSION["user"][1] !== ADMIN): ?>
    <a class="dropdown-item text-primary" href="../php/userModify.php">Modifica account</a>
<?php endif; ?>
<?php 
    switch($_SESSION["user"][1]){
        case USER:
            require('userListItem.php');
        break;
        case ORGANIZER:
            require('organizerListItem.php');
        break;
        case ADMIN:
            require('adminListItem.php');
        break;
    }
?>
    <a class="dropdown-item text-primary" href="../php/logout.php">Esci</a>