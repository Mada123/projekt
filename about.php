<?php session_start();
      require_once('db.php');
?>

<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scal e=1">
 <title>System siatkowy Bootstrapa</title>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 
 <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
 <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

 </head>
 <body>
 <!-- Tre�� strony -->
<!-- Tytu� strony -->
<div class="container">
 <div class="page-header">
 <h1>Wypo�yczalnia film�w  <small>  Najlepsze filmy nie tylko na d�ugie wieczory</small></h1>
 </div>
</div>

 <!-- menu strony -->
 <div class="navbar navbar-default">
 <div class="container-fluid">
 <div class="navbar-header">
 <button type="button" class="navbar-toggle" data-toggle="collapse"
 ?data-target="#mynavbar-content">
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 </button>
 <a class="navbar-brand" href="#">MENU STRONY</a>
 </div>
 <div class="collapse navbar-collapse" id="mynavbar-content">
 <ul class="nav navbar-nav">
 <li class="active"><a href="index.php">Strona g��wna</a></li>
 <li><a href="about.php">O nas</a></li>
 <li><a href="prices.php">Cennik</a></li>
 <li><a href="library.php">Biblioteka film�w</a></li>
 <li><a href="contact.php">Kontakt</a></li>
 <li><a href="mail.php">Napisz do nas</a></li>
 <li><a href="register.php">Zarejestruj</a></li>
 <li>
  <?php
    /* je�eli nie wype�niono formularza - to znaczy nie istnieje zmienna login, has�o i sesja auth
     * to wy�wietl formularz logowania
     */
    if (!isset($_POST['login']) && !isset($_POST['password']) && $_SESSION['auth'] == FALSE) {
  ?>
   <form class="form-inline" name="form-logowanie" action="index.php" method="post">
  <input type="text" class="input-small" name="login" placeholder="login">
  <input type="password" class="input-small" name="password" placeholder="Password">
  <label class="checkbox">
    <input type="checkbox"> Zapamietaj mnie
  </label>
  <button type="submit" name="zaloguj" class="btn btn-primary">Zaloguj</button>
</form>

  <?php
  }
    /* je�eli istnieje zmienna login oraz password i sesja z autoryzacj� u�ytkownika jest FALSE to wykonaj
     * skrypt logowania
     */
	elseif (isset($_POST['login']) && isset($_POST['password']) && $_SESSION['auth'] == FALSE) {
      
        // je�eli pole z loginem i has�em nie jest puste      
		if (!empty($_POST['login']) && !empty($_POST['password'])) {
          
		// dodaje znaki unikowe dla potrzeb polece� SQL
		$login = mysql_real_escape_string($_POST['login']);
		$password = mysql_real_escape_string($_POST['password']);
        
        // szyfruj� wpisane has�o za pomoc� funkcji md5()
        $password = sha1($password);
		
        /* zapytanie do bazy danych
         * mysql_num_rows - sprawdzam ile wierszy odpowiada zapytaniu mysql_query
         * mysql_query - pobierz wszystkie dane z tabeli user gdzie login i has�o odpowiadaj� wpisanym danym
         */
		$sql = mysql_num_rows(mysql_query("SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password'"));
		
			// je�eli powy�sze zapytanie zwraca 1, to znaczy, �e dane zosta�y wpisane poprawnie i rejestruj� sesj�
			if ($sql == 1) {
              
                // zmienne sesysje user (z loginem zalogowanego u�ytkownika) oraz sesja autoryzacyjna ustawiona na TRUE
				$_SESSION['user'] = $login;
				$_SESSION['auth'] = TRUE;
                
                // przekierwuj� u�ytkownika na stron� z ukrytymi informacjami
				echo '<meta http-equiv="refresh" content="1; URL=index.php">';
				echo '<p style="padding-top:10px";><strong>Prosz� czeka�...</strong><br />trwa logowanie i wczytywanie danych</p>';
			}
            
            // je�eli zapytanie nie zwr�ci 1, to wy�wietlam komunikat o b��dzie podczas logowania
			else {
				echo '<p style="padding-top:10px;color:red";>B��d podczas logowania do systemu<br />';
				echo '<a href="index.php">Wr�� do formularza</a></p>';
			}
		}
        
        // je�eli pole login lub has�o nie zosta�o uzupe�nione wy�wietlam b��d
		else {
			echo '<p style="padding-top:10px;color:red";>B��d podczas logowania do systemu106<br />';
			echo '<a href="index.php">Wr�� do formularza</a></p>';
		}
	}
    
    // je�eli sesja auth jest TRUE to przekieruj na ukryt� podstron�
	if ($_SESSION['auth'] == TRUE) {
       echo '<a href="index.php?logout">Wyloguj si�</a>';
  }
  else {
          echo '<meta URL=index.php">';
       //   echo '<p style="padding-top:10px;color:white";><strong>Pr�ba nieautoryzowanego dost�pu...</strong><br />trwa przenoszenie do formularza logowania</p>';
  }
    
  // wyloguj si�
    if  ($_SESSION['auth'] == TRUE && isset($_GET['logout'])) {
		$_SESSION['user'] = '';
		$_SESSION['auth'] = FALSE;
		echo '<meta http-equiv="refresh" content="1; URL=index.php">';
		echo '<p style="padding-top:10px"><strong>Prosz� czeka�...</strong><br />trwa wylogowywanie</p>';
	}
  ?>
  </li>

 </ul>
 </div>

 </div>

 <script src="js/jquery.js"></script>
 <script src="js/bootstrap.js"></script>
 <script src="js/simpleCart.js"></script>
</body>
</html>

<?php

?>