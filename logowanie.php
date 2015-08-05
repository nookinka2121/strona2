

<?php
session_start();
include 'config.php';

$pdo = new PDO($tablica['dns'], $tablica['user'], $tablica['password']);


?>
 
<form method="POST" action="logowanie.php">
<b>Login:</b> <input type="text" name="login"><br>
<b>Haslo:</b> <input type="password" name="haslo"><br>
<input type="submit" value="Zaloguj" name="loguj">
</form>


<?php

 
if (isset($_POST['loguj']))
{
	$login = $_POST['login'];
	$haslo = md5($_POST['haslo']);


  $stmt = $pdo->prepare("SELECT * FROM uzytkownicy WHERE login=:login AND haslo=:haslo");
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":haslo", $haslo, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($stmt->rowCount()!=0){
    
 		$_SESSION['zalogowany'] = true; 
 		$_SESSION['login'] = $login; 
 		echo "Zalogowano!<br><br>";  		 
	echo "<a href=\"sesja.php\">Moje Konto</a><br>"; 

    }

}
?>
<html><br>
<a href="index.php"><img src="wroc.png"/></a><br></html>