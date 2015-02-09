<?php
  /*Połączenie z bazą danych*/
  $dbhost = 'localhost'; 	
  $dblogin = 's178212';
  $dbpass = 'kjbpq3LQ';
  $dbselect = 's178212';
  mysql_connect($dbhost,$dblogin,$dbpass);
  mysql_select_db($dbselect) or die("Błąd przy wyborze bazy danych");
  mysql_query("SET CHARACTER SET UTF8");
?>