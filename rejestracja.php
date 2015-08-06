
<?php
function formularz($login = "",$haslo1="",$haslo2="",$email="")
{
?> 
<form method="POST" action="rejestracja.php">
<b>Login:</b> <input type="text" name="login" value="<?= $login; ?>" /> <?php if( isset($_POST['rejestruj']) &&($login =="" || $login ==NULL)) echo "Podaj login (powyzej 4 znakow)"; ?><br><br />
<b>Haslo:</b> <input type="password" name="haslo1"/><?php if( (isset($_POST['rejestruj']) && (($haslo1 =="" || $haslo1 ==NULL) || (($login =="" || $login ==NULL) || ($email =="" || $email ==NULL)) ) )) echo "Podaj haslo (powyzej 4 znakow)"; ?><br><br>
<b>Powtorz haslo:</b> <input type="password" name="haslo2" /><?php if( isset($_POST['rejestruj']) &&($haslo2 =="" || $haslo2 ==NULL) && !($haslo1 =="" || $haslo1 ==NULL)) echo "Powtorz haslo"; ?><br><br>
<b>Email:</b> <input type="text" name="email" value="<?= $email; ?>"/> <?php if( isset($_POST['rejestruj']) &&($email =="" || $email ==NULL)) echo "Podaj email"; ?><br><br />
<input type="submit" value="Utworz konto" name="rejestruj">
</form>



<?php
}
?>

<?php

if (isset($_POST['rejestruj']))
{
include 'config.php';

 $pdo = new PDO($tablica['dns'], $tablica['user'], $tablica['password']);


$sprawdz = '/([a-z|A-Z|0-9]{4,20})/';
if ( !preg_match($sprawdz, str_replace(' ','',$_POST["login"]) )) {
    //print 'Podaj poprawny login<br>';
    $login=NULL;
} else
{
$login = str_replace(' ', '',$_POST['login']);
}
 
 $sprawdz = '/([a-z|A-Z|0-9]{4,20})/';
if ( !preg_match($sprawdz, str_replace(' ','',$_POST["haslo1"])) ){
   // print 'Podaj poprawne haslo<br>';
   $haslo1=NULL;
} else
{
$haslo1= str_replace(' ','',$_POST["haslo1"]);
}

 
 $sprawdz = '/^([a-z|A-Z|0-9]{4,20})@([a-z|A-Z|0-9]{2,10})\\.(pl|gr|com)$/';
if ( !preg_match($sprawdz,str_replace(' ','',$_POST["email"]) )) {
   // print 'Podaj poprawny email<br>';
    $email=NULL;
} else
{
$email= str_replace(' ','',$_POST["email"]);
}

$haslo2 = str_replace(' ','',$_POST["haslo2"]);
if ($haslo1 != $haslo2) 
{
$haslo1=NULL;
}

formularz($login,$haslo1,$haslo2,$email);


  if (empty($_POST["haslo1"]) ||
        empty($_POST["haslo2"]) ||
        empty($_POST["login"]) || empty($_POST["email"])) {
    } 
else{

if ($haslo1 == $haslo2) 
		{
		

           $ilosc = $pdo -> exec('INSERT INTO `uzytkownicy` (`login`, `haslo`, `email`)  VALUES(
                \''.$_POST['login'].'\',
                \''.md5($_POST['haslo1']).'\',  
                \''.$_POST['email'].'\')');  



			echo "Konto zostalo utworzone!<br>";
            //nowy formularz.
            //czyszczenie formul
        

		}
	


}

	
}

else
{

    formularz();
}

?>
<html><a href="index.php"><img src="wroc.png"/></a></html>