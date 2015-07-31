
<?php

ob_start();
include 'logowanie.php';
ob_end_clean();


echo "Witaj ".$_SESSION['login'];


?>
