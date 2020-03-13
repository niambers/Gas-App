<?php

$servername = "database"; // Automatically resolves to the docker service named 'database'
$database = "test";
$username = "test";
$password = "test";
$attempt = 3;

while ($attempt>0) { // Attempts to connect to the database 3 times
    try {
        sleep(2); // Wait 2 seconds before attempting to connect to the database
        $connection = new PDO("mysql:host=$servername;dbname=test",$username,$password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set PDO error mode to exception
        $attempt = 0; // Set attempt to 0 to exit while loop after successful connection
        echo "Connection Successful\n";
    }
    catch (PDOException $e) {
        echo "Connection Failed: " . $e->getMessage() . "\n"; // Print out error messages
        $attempt--;
        sleep(2); // Wait 2 seconds between attempts
    }
}
//$connection = null; // Closes the connection automatically when the program ends
//$query = "INSERT INTO users (user_id,name,phone_number) VALUES ('3','joe','9333339345')";
//$connection->exec($query);