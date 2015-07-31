<form method="POST" action="rejestracja.php">
<b>Login:</b> <input type="text" name="login"><br><br>
<b>Haslo:</b> <input type="password" name="haslo1"><br><br>
<b>Powtorz haslo:</b> <input type="password" name="haslo2"><br><br>
<b>Email:</b> <input type="text" name="email"><br><br>
<input type="submit" value="Utworz konto" name="rejestruj">
</form>

<?php

if (isset($_POST['rejestruj']))
{
include 'config.php';
$connection = @mysql_connect($tablica['localhost'], $tablica['user'], $tablica['password']);
$db = @mysql_select_db($tablica['basename'],$connection);

$query='SELECT * FROM uzytkownicy';

$sprawdz = '/([a-z|A-Z|0-9]{4,20})/';
if ( !preg_match($sprawdz, $_POST["login"]) ) {
    print 'Podaj poprawny login<br>';
    $_POST["login"]=NULL;
} else
{
$login = $_POST['login'];
}
 
 $sprawdz = '/([a-z|A-Z|0-9]{4,20})/';
if ( !preg_match($sprawdz, $_POST["haslo1"]) ) {
    print 'Podaj poprawne haslo<br>';
    $_POST["haslo1"]=NULL;
} else
{
$haslo1= $_POST['haslo1'];
}

 
 $sprawdz = '/^([a-z|A-Z|0-9]{4,20})@([a-z|A-Z|0-9]{2,10})\\.(pl|gr|com)$/';
if ( !preg_match($sprawdz, $_POST["email"]) ) {
    print 'Podaj poprawny email<br>';
    $_POST["email"]=NULL;
} else
{
$email= $_POST['email'];
}

$haslo2 = $_POST['haslo2'];


  if (empty($_POST["haslo1"]) ||
        empty($_POST["haslo2"]) ||
        empty($_POST["login"]) || empty($_POST["email"])) {
      print 'Podaj poprawne dane<br>';
    } 
else{

if ($haslo1 == $haslo2) 
		{
		
 $query = "insert into uzytkownicy(login, haslo,email) 
values ('".$login."', '".$haslo1."','".$email."')";


			echo "Konto zostalo utworzone!";
		}
		else echo "Hasla nie sa takie same";

}
	$result=mysql_query($query);
	mysql_close($connection);	
	
}



?>
<html><a href="index.php"><img src="wroc.png"/></a></html>