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
 <li class="active"><a href="#">Strona główna</a></li>
 <li><a href="#">O nas</a></li>
 <li><a href="#">Cennik</a></li>
 <li><a href="#">Biblioteka filmów</a></li>
 <li><a href="#">Rejestracja</a></li>
 <li><a href="#">Kontakt</a></li>
 <li><a href="#">Napisz do nas</a></li>
 <li>
  <?php
    /* jeżeli nie wypełniono formularza - to znaczy nie istnieje zmienna login, hasło i sesja auth
     * to wyświetl formularz logowania
     */
    if (!isset($_POST['login']) && !isset($_POST['password']) && $_SESSION['auth'] == FALSE) {
  ?>
  
      <form name="form-logowanie" action="index1.php" method="post">
          Login: <input type="text" name="login" /><br />
          Hasło: <input type="password" name="password" />
          <input type="submit" name="zaloguj" value="Zaloguj" />
      </form>
  
  <?php
  }
    /* jeżeli istnieje zmienna login oraz password i sesja z autoryzacją użytkownika jest FALSE to wykonaj
     * skrypt logowania
     */
	elseif (isset($_POST['login']) && isset($_POST['password']) && $_SESSION['auth'] == FALSE) {
      
        // jeżeli pole z loginem i hasłem nie jest puste      
		if (!empty($_POST['login']) && !empty($_POST['password'])) {
          
		// dodaje znaki unikowe dla potrzeb poleceń SQL
		$login = mysql_real_escape_string($_POST['login']);
		$password = mysql_real_escape_string($_POST['password']);
        
        // szyfruję wpisane hasło za pomocą funkcji md5()
        $password = md5($password);
		
        /* zapytanie do bazy danych
         * mysql_num_rows - sprawdzam ile wierszy odpowiada zapytaniu mysql_query
         * mysql_query - pobierz wszystkie dane z tabeli user gdzie login i hasło odpowiadają wpisanym danym
         */
		$sql = mysql_num_rows(mysql_query("SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password'"));
		
			// jeżeli powyższe zapytanie zwraca 1, to znaczy, że dane zostały wpisane poprawnie i rejestruję sesję
			if ($sql == 1) {
              
                // zmienne sesysje user (z loginem zalogowanego użytkownika) oraz sesja autoryzacyjna ustawiona na TRUE
				$_SESSION['user'] = $login;
				$_SESSION['auth'] = TRUE;
                
                // przekierwuję użytkownika na stronę z ukrytymi informacjami
				echo '<meta http-equiv="refresh" content="1; URL=index1.php">';
				echo '<p style="padding-top:10px";><strong>Proszę czekać...</strong><br />trwa logowanie i wczytywanie danych</p>';
			}
            
            // jeżeli zapytanie nie zwróci 1, to wyświetlam komunikat o błędzie podczas logowania
			else {
				echo '<p style="padding-top:10px;color:red";>Błąd podczas logowania do systemu<br />';
				echo '<a href="index1.php">Wróć do formularza</a></p>';
			}
		}
        
        // jeżeli pole login lub hasło nie zostało uzupełnione wyświetlam błąd
		else {
			echo '<p style="padding-top:10px;color:red";>Błąd podczas logowania do systemu106<br />';
			echo '<a href="index1.php">Wróć do formularza</a></p>';	
		}
	}
    
    // jeżeli sesja auth jest TRUE to przekieruj na ukrytą podstronę
	if ($_SESSION['auth'] == TRUE) {
       echo '<a href="index1.php?logout">Wyloguj się</a>';
  }
  else {
          echo '<meta URL=index1.php">';
       //   echo '<p style="padding-top:10px;color:white";><strong>Próba nieautoryzowanego dostępu...</strong><br />trwa przenoszenie do formularza logowania</p>';
  }
    
  // wyloguj się
    if  ($_SESSION['auth'] == TRUE && isset($_GET['logout'])) {
		$_SESSION['user'] = '';
		$_SESSION['auth'] = FALSE;
		echo '<meta http-equiv="refresh" content="1; URL=index1.php">';
		echo '<p style="padding-top:10px"><strong>Proszę czekać...</strong><br />trwa wylogowywanie</p>';
	}
  ?>
  </li>
  
 </ul>
 </div>

 </div>
</div>

 <!-- Artykuly strony -->

 <div class="row">
 <div class="col-md-4">
 <h3>Promocje</h3>
 <p>Aktualne promocje..... </p>
 </div>
 <div class="col-md-4">
 <h3>Cennik</h3>
 <p>Podstawowy cennik ..... </p>
 </div>
 <div class="col-md-4">
 <h3>Aktualność</h3>
 <p>Baz filmow powiekszyła sie o ...... </p>
 </div>
 </div>
</div>
 </div>
 </br></br></br>
 <!-- Media strony -->

 <div class="col-xs-3">
<div class="thumbnail">
 <img src="media/monster.jpg">
 <div class="caption">
 <h3>2012</h3>
 <p>Import opisu z bazy.</p>
 <p><a href="#" cl ass="btn btn-primary">Więcej</a></p>
 </div>
</div>
</a>
  </div>
 <div class="col-xs-3">
<div class="thumbnail">
 <img src="media/monster.jpg">
 <div class="caption">
 <h3>Lejdis</h3>
 <p>Import opisu z bazy....</p>
 <p><a href="#" cl ass="btn btn-primary">Więcej</a></p>
 </div>
</div>
</a>
 </div>
 <div class="col-xs-3">
<div class="thumbnail">
 <img src="media/monster.jpg">
 <div class="caption">
 <h3>Valkiria</h3>
 <p>Import opisu z bazy....</p>
 <p><a href="#" cl ass="btn btn-primary">Wi ęcej</a></p>
 </div>
</div>
</a>
 </div>
 <div class="col-xs-3">
 <div class="thumbnail">
 <img src="media/monster.jpg">
 <div class="caption">
 <h3>Pianista</h3>
 <p>Import opisu z bazy...</p>
 <p><a href="#" cl ass="btn btn-primary">Wi ęcej</a></p>
 </div>
</div>
</a>
 </div>
</div>
</br></br></br>

<!-- Pokaz slajdow  poprawic nie dziala

 Kontener dla slajdów
 
 <div id="bestCarsCarousel" class="carousel slide" data-ride="carousel">
Wskaźniki

 <ol class="carousel-indicators">
 <li data-target="#bestCarsCarousel" data-slide-to="0" class="active"></li>
 <li data-target=" #bestCarsCarousel" data-sl ide-to="1"></li>
 <li data-target="#bestCarsCarousel" data-slide-to="2"></li>
 </ol>

Kontener dla slajdów

 <div class="carousel-inner">
 <div class="item active">
 <img src="media/1.jpg">
 <div class="carousel-caption">
 <h3>Samochód 1.</h3>
 <p>Lorem ipsum dolor sit amet, consectetur ...</p>
 </div>
 </div>
 <div class="item">
 <img src="media/2.jpg">
 <div class="carousel-caption">
 <h3>Samochód 2.</h3>
 <p>Lorem ipsum dolor sit amet, consectetur ...</p>
 </div>
 </div>
 <div class="item">
 <img src="media/3.jpg">
 <div class="carousel-caption" >
 <h3>Samochód 3.</h3>
 <p>Lorem ipsum dolor sit amet, consectetur ...</p>
 </div>
 </div>
 </div>
 
 Kontrolki
 
 <a class="left carousel-control" href="#bestCarsCarousel" data-slide="prev">
 <span class="glyphicon glyphicon-chevron-left"></span>
 </a>
 <a class="right carousel-control" href="#bestCarsCarousel" data-slide="next">
 <span class="glyphicon glyphicon-chevron-right"></span>
 </a>
</div>
-->

<?php if ($_SESSION['auth'] == TRUE) {
          echo 'UKRYTA TREŚĆ!<br />';
          echo '<a href="index.php?logout">Wyloguj się</a>';
  }
  else {
          echo '<meta URL=index1.php">';
          echo '<p style="padding-top:10px;color:white";><strong>Próba nieautoryzowanego dostępu...</strong><br />trwa przenoszenie do formularza logowania</p>';
  }
  
  
  ?>
  
  
 <script src="js/jquery.js"></script>
 <script src="js/bootstrap.js"></script>
 <script src="js/simpleCart.js"></script>
 </body>
</html>

<?php

?>