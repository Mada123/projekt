<?php session_start();
      require_once('db.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>Skrypt logowania z wykorzystaniem PHP i bazy MySQL</title>
<meta name="description" content="Kurs jQuery" />
<meta name="keywords" content="kurs, jquery, mlaskowski.pl" />
</head>

<body>
  
  <?php
    /* jeżeli nie wypełniono formularza - to znaczy nie istnieje zmienna login, hasło i sesja auth
     * to wyświetl formularz logowania
     */
    if (!isset($_POST['login']) && !isset($_POST['password']) && $_SESSION['auth'] == FALSE) {
  ?>
  
      <form name="form-logowanie" action="index.php" method="post">
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
				echo '<meta http-equiv="refresh" content="1; URL=hide.php">';
				echo '<p style="padding-top:10px";><strong>Proszę czekać...</strong><br />trwa logowanie i wczytywanie danych</p>';
			}
            
            // jeżeli zapytanie nie zwróci 1, to wyświetlam komunikat o błędzie podczas logowania
			else {
				echo '<p style="padding-top:10px;color:red";>Błąd podczas logowania do systemu<br />';
				echo '<a href="index.php">Wróć do formularza</a></p>';
			}
		}
        
        // jeżeli pole login lub hasło nie zostało uzupełnione wyświetlam błąd
		else {
			echo '<p style="padding-top:10px;color:red";>Błąd podczas logowania do systemu<br />';
			echo '<a href="index.php">Wróć do formularza</a></p>';	
		}
	}
    
    // jeżeli sesja auth jest TRUE to przekieruj na ukrytą podstronę
	elseif ($_SESSION['auth'] == TRUE && !isset($_GET['logout'])) {
		echo '<meta http-equiv="refresh" content="1; URL=hide.php">';
		echo '<p style="padding-top:10px"><strong>Proszę czekać...</strong><br />trwa wczytywanie danych</p>';
	}
    
    // wyloguj się
	elseif ($_SESSION['auth'] == TRUE && isset($_GET['logout'])) {
		$_SESSION['user'] = '';
		$_SESSION['auth'] = FALSE;
		echo '<meta http-equiv="refresh" content="1; URL=index.php">';
		echo '<p style="padding-top:10px"><strong>Proszę czekać...</strong><br />trwa wylogowywanie</p>';
	}
  ?>
  
</body>
  
</html>
