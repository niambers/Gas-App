<?php

require_once(__DIR__ . '/vendor/autoload.php');
//autoloading: allows us to use PHP classes
//without the need to require() or include()

define("RABBITMQ_HOST", "rabbitmq.programster.org"); //Ask about this
define("RABBITMQ_PORT", 5672);
define("RABBITMQ_USERNAME", "group1");
define("RABBITMQ_PASSWORD", "getajob");
define("RABBITMQ_QUEUE_NAME", "sample"); //sameple = a test queue

$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection(
    RABBITMQ_HOST,
    RABBITMQ_PORT,
    RABBITMQ_USERNAME,
    RABBITMQ_PASSWORD
);

$channel = $connection->channel();

# Create the queue if it does not already exist.
$channel->queue_declare(
    $queue = RABBITMQ_QUEUE_NAME,
    $passive = false,
    $durable = true,
    //3rd parameter as true to make it durable in case something crashed
    $exclusive = false,
    $auto_delete = false,
    $nowait = false,
    //$arguments = null,
    //$tickets = null,
    //https://www.rabbitmq.com/queues.html
);

$data = implode(' ', array_slice($argv, 1));
if (empty($data)) {
    $data = "Test. 1. 2. 3.";
}
$msg = new AMQPMessage(
    $data,
    array('delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT)
);

$channel->basic_publish($msg, '', 'sample');

echo ' [x] Sent ', $data, "\n";

$channel->close();
$connection->close();

?>
