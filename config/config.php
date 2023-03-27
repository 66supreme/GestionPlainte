<?php
 define('HOST', 'localhost');
 define('USER', 'root');
 define('DB_NAME', 'gestionplainte');
 define('PASSWORD', '');

 $connexion = new PDO("mysql:host=".HOST.";dbname=".DB_NAME,USER,PASSWORD);
