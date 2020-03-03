<?php


error_reporting(E_ALL); // Displays all PHP errors and warnings

$username = "test";
$password = "test";
$hostname = "database";
$dsn = "mysql:host=$hostname;dbname=$username"; // DO NOT ADD ANY SPACES, THROWS ERROR!

$db = new PDO('mysql:host'$dsn, $username, $password);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$fname = "john";
$query = "SELECT * FROM users WHERE fname = :name";
$statement = $db->prepare($query);
$statement->bindValue(':name', $fname);
$statement->bindValue(':password', $password);
$statement->execute();