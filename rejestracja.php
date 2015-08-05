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

 $pdo = new PDO($tablica['dns'], $tablica['user'], $tablica['password']);


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
		

           $ilosc = $pdo -> exec('INSERT INTO `uzytkownicy` (`login`, `haslo`, `email`)  VALUES(
                \''.$_POST['login'].'\',
                \''.md5($_POST['haslo1']).'\',  
                \''.$_POST['email'].'\')');  



			echo "Konto zostalo utworzone!";
		}
		else echo "Hasla nie sa takie same";

}

	
}



?>
<html><a href="index.php"><img src="wroc.png"/></a></html>