<?php session_start();
      require_once('db.php');
?>

<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scal e=1">
 <title>FILMY</title>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

 <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
 <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

 </head>
 <body>
 <!-- Treść strony -->
<!-- Tytuł strony -->
<div class="container">
 <div class="page-header">
 <h1>Wypożyczalnia filmów  <small>  Najlepsze filmy nie tylko na długie wieczory</small></h1>
 </div>
</div>

 <!-- menu strony -->
 <div class="navbar navbar-default">
 <div class="container-fluid">
 <div class="navbar-header">
 <button type="button" class="navbar-toggle" data-toggle="collapse"
 data-target="#mynavbar-content">
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 </button>
 <a class="navbar-brand" href="#">MENU STRONY</a>
 </div>
 <div class="collapse navbar-collapse" id="mynavbar-content">
 <ul class="nav navbar-nav">
 <li><a href="index.php">Strona główna</a></li>
 <li><a href="about.php">O nas</a></li>
 <li><a href="prices.php">Cennik</a></li>
 <li><a href="library.php">Biblioteka filmów</a></li>
 <li><a href="contact.php">Kontakt</a></li>
 <li><a href="mail.php">Napisz do nas</a></li>
 <li class="active"><a href="register.php">Zarejestruj</a></li>
 </ul>
 </div>

 </div>
</div>

<!--Rejerstracja uzytkownika-->

<?php
   	function filtruj($zmienna)
	{
	    if(get_magic_quotes_gpc())
	        $zmienna = stripslashes($zmienna); // usuwamy slashe

		// usuwamy spacje, tagi html oraz niebezpieczne znaki
	    return mysql_real_escape_string(htmlspecialchars(trim($zmienna)));
	}

	if (isset($_POST['register']))
	{
		$loginr = filtruj($_POST['loginr']);
		$haslor1 = filtruj($_POST['haslor1']);
		$haslor2 = filtruj($_POST['haslor2']);
		$emailr = filtruj($_POST['emailr']);

		// sprawdzamy czy login nie jest już w bazie
		if (mysql_num_rows(mysql_query("SELECT login FROM user WHERE login = '".$loginr."';")) == 0)
		{
			if ($haslor1 == $haslor2) // sprawdzamy czy hasła takie same
			{
				mysql_query("INSERT INTO `user` (`login`, `password`, `email`)
					VALUES ('".$loginr."', '".sha1($haslor1)."', '".$emailr."');");

				echo "Konto zostało utworzone!";
                echo '<meta http-equiv="refresh" content="2; URL=index.php">';
			}
			else echo "Hasła nie są takie same";
            //echo '<meta http-equiv="refresh" content="1; URL=register.php">';
		}
		else echo "Podany login jest już zajęty.";
        //echo '<meta http-equiv="refresh" content="1; URL=register.php">';
	}

	?>

	<form method="POST" action="register.php">
	Login: <input type="text" name="loginr">
	Hasło: <input type="password" name="haslor1">
	Powtórz hasło: <input type="password" name="haslor2">
	Email: <input type="text" name="emailr">
	<input type="submit" value="Utwórz konto" name="register"class="btn btn-primary">
	</form>

</div>
 <script src="js/jquery.js"></script>
 <script src="js/bootstrap.js"></script>
 <script src="js/simpleCart.js"></script>
 </body>
</html>

<?php

?>