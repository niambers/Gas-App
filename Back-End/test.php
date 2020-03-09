<?php




$username = "test";
$password = "test";
$hostname = "database";
$dsn = "mysql:host=$hostname;dbname=$username"; // DO NOT ADD ANY SPACES, THROWS ERROR!

$db = new PDO('mysql:host'$dsn, $username, $password);
