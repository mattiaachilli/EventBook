<font size="5" color="white">Questa home è solo per provare le varie pagine!!!</font>
<br>
<font size="13"><a href="login.php">Login</a> </font>
<br>
<font size="13"><a href="registration.php">Registrazione</a></font>
<br>
<font size="13"><a href="changePassword.php">Cambia Password</a></font>
<br>
<font size="13"><a href="events.php">Eventi in programma</a></font>
<br>
<font size="13"><a href="eventInfo.php">Info evento</a></font>
<br>
<font size="13"><a href="cart.php">Carrello</a></font>

<?php
    if(isUserLoggedIn()) {
        echo '<br><font size="13"><a href="logout.php">Esci</a></font>';
    }
?>
