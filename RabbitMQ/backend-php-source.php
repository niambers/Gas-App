<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

//Do I have to put password credentials?
$connection = new AMQPStreamConnection('localhost', 15672, 'group1', 'getajob');
$channel = $connection->channel();

//marking the 3 parameter as true for durability
$channel->queue_declare('sample_queue', false, true, false, false);

$data = implode(' ', array_slice($argv, 1));
if (empty($data)) {
    $data = "Test. 1. 2. 3.";
}
$msg = new AMQPMessage(
    $data,
    array('delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT)
);

$channel->basic_publish($msg, '', 'sample_queue');

echo ' [x] Sent ', $data, "\n";

$channel->close();
$connection->close();

?>
