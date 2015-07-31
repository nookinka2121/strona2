

<?php
session_start();
$connection = @mysql_connect('localhost','root','');
$db = @mysql_select_db('users', $connection);
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
	$haslo = $_POST['haslo'];
	
 
	
	if (mysql_num_rows(mysql_query("SELECT login, haslo FROM uzytkownicy WHERE login = '".$login."' AND haslo = '".$haslo."';")) > 0)
	{
 
		$_SESSION['zalogowany'] = true;
		$_SESSION['login'] = $login;
		echo "Zalogowano!<br><br>";
		
	echo "<a href=\"sesja.php\">Moje Konto</a>";
	}
	else echo "Wpisano zle dane.";
}
?>
