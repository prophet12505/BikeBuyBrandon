<?php
  // DB connection information
  
  // Set DB access constants : local database
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_USER', 'root');
  DEFINE('DB_PASSWORD', ''); 
  DEFINE('DB_NAME', 'bikebuy');
  // Set DB access constants : remote database
  // DEFINE('DB_HOST', 'localhost');
  // DEFINE('DB_USER', 'hongxin');
  // DEFINE('DB_PASSWORD', 'f&cvl*l]Nu8&'); 
  // DEFINE('DB_NAME', 'hongxin');
  // Make a connection
  $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Sorry, the system is down right now. Please check again later.');

  // Set the character set
  mysqli_set_charset($dbc, 'utf8');
