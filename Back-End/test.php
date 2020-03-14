<?php
// Testing RabbitMQ receiving code
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('messaging', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);

echo " [*] Waiting for messages. To exit press CTRL+C\n";

$callback = function ($msg) {
    echo ' [x] Received ', $msg->body, "\n";
};

$channel->basic_consume('hello', '', false, true, false, false, $callback);

while ($channel->is_consuming()) {
    $channel->wait();
}

$channel->close();
$connection->close();

// Automatically resolve to the docker service named 'database'
/*$servername = "database";
$database = "test";
$username = "test";
$password = "test";

// Limit to 3 attempts
$attempt = 3;

// Attempt connection to database
while ($attempt>0) {
    try {
        // Wait 2 seconds before connection attempt
        sleep(2);
        $connection = new PDO("mysql:host=$servername;dbname=test",$username,$password);

        // Set PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //  Set attempt to 0 in order to exit the while loop after establishing a connection
        $attempt = 0;
        echo "Connection Successful\n";
    }
    catch (PDOException $e) {
        // Print out error messages
        echo "Connection Failed: " . $e->getMessage() . "\n";
        $attempt--;
        // Wait 2 seconds before connection attempt
        sleep(2);
    }
}

//$connection = null; // Closes the connection automatically when the program ends
//$query = "INSERT INTO users (user_id,name,phone_number) VALUES ('3','joe','9333339345')";
//$connection->exec($query);*/