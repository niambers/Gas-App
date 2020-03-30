var amqp = require('amqplib/callback_api');

//amqp.connect('amqp://group1:getajob@messaging:5672', function(error, connection) {
amqp.connect('amqp://localhost', function(error, connection) {

    //create connection
    connection.createChannel(function(error, channel) {
        var queue = 'sample';

        channel.assertQueue(queue, {
            durable: true
        });
        channel.prefetch(1);
        //log the messages recieved from source code
        console.log(" [*] Waiting for messages in %s. To exit press CTRL+C", queue);
        channel.consume(queue, function(msg) {
            var secs = msg.content.toString().split('.').length - 1;

            //display message recieved in terminal shows it went through
            console.log(" [x] Received %s", msg.content.toString());
            //stop code if taking to long | MAX out time in secs below
            setTimeout(function() {
                console.log(" [x] Done");
                channel.ack(msg);
            }, secs * 1000);
        }, {
            noAck: false
        });
    });
});
