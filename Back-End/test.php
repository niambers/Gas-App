<?php

$servername = "database";
$database = "test";
$username = "test";
$password = "test";

try {
    $connection = new PDO("mysql:host=$servername;$database",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}