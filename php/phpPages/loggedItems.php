<?php 
    require_once("bootstrap.php");
?>
<a class = "dropdown-item text-primary" href="login.php">Benvenuto <?php echo $_SESSION["user"][0]?></a>
<a class="dropdown-item text-primary" href="logout.php">Esci</a>
<a class="dropdown-item text-primary" href="registration.php">Registrati</a>
<a class="dropdown-item text-primary" href="cart.php">
    <i class = "fas fa-shopping-cart"></i>
</a>