
<?php

ob_start();
include 'logowanie.php';
ob_end_clean();


echo "Witaj ".$_SESSION['login']."<br><br><br>";


?>
<html><a href="index.php"><img src="wroc.png"/></a><br></html>