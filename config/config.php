<?php
 define('HOST', 'localhost');
 define('USER', 'fofana');
 define('DB_NAME', 'GestionPlainte');
 define('PASSWORD', '4875');

 $connexion = new PDO("mysql:host=".HOST.";dbname=".DB_NAME,USER,PASSWORD);
?>