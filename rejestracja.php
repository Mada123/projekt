<style>
body {
font-size:15px;
font-family:Verdana;
line-height:1.8;
word-spacing:3px;
}
</style>

<form method="POST" action="rejestracja.php">
<b>Login:</b> <input type="text" name="login"><br>
<b>Has�o:</b> <input type="password" name="haslo1"><br>
<b>Powt�rz has�o:</b> <input type="password" name="haslo2"><br>
<b>Email:</b> <input type="text" name="email"><br>
<input type="submit" value="Zrejestruj" name="zaluz">
</form> 

<?php
mysql_connect("localhost","root","");
mysql_select_db("test");

function filtruj($zmienna) 
{
    if(get_magic_quotes_gpc())
        $zmienna = stripslashes($zmienna); // usuwamy slashe

	// usuwamy spacje, tagi html oraz niebezpieczne znaki
    return mysql_real_escape_string(htmlspecialchars(trim($zmienna))); 
}

if (isset($_POST['zaluz'])) 
{
	$login = filtruj($_POST['login']);
	$haslo1 = filtruj($_POST['haslo1']);
	$haslo2 = filtruj($_POST['haslo2']);
	$email = filtruj($_POST['email']);
	$ip = filtruj($_SERVER['REMOTE_ADDR']);
	
	// sprawdzamy czy login nie jest ju� w bazie
	if (mysql_num_rows(mysql_query("SELECT login FROM uzytkownicy WHERE login = '".$login."';")) == 0) 
	{
		if ($haslo1 == $haslo2) // sprawdzamy czy has�a takie same
		{
			mysql_query("INSERT INTO `uzytkownicy` (`login`, `haslo`, `email`, `rejestracja`, `logowanie`, `ip`)
				VALUES ('".$login."', '".md5($haslo1)."', '".$email."', '".time()."', '".time()."', '".$ip."');");

			echo "Konto zosta�o utworzone!";
		}
		else echo "Has�a nie s� takie same";
	}
	else echo "Podany login jest ju� zaj�ty.";
}
?>

<?php mysql_close(); ?>