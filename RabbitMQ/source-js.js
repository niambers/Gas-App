var amqp = require('amqplib/callback_api');

amqp.connect('amqp://group1:getajob@messaging:5672', function(error0, connection) {
    //by default rabbitmq runs on localhost
    //however for this project we are running on host messaging ... i think
    if (error0) {
        throw error0;
    }
    connection.createChannel(function(error1, channel) {
        if (error1) {
            throw error1;
        }
        var queue = 'sample'; //sample = a test queue
        var msg = process.argv.slice(2).join(' ') || "It's working?";

        //Making the queue qualifications
        //durable meaning it the queue will remain constant even if the connnection crashes
        channel.assertQueue(queue, {
            durable: true
        });
        //send the message above to the queue
        channel.sendToQueue(queue, Buffer.from(msg), {
            persistent: true
        });
        console.log(" [x] Sent '%s'", msg); //display that it was indeed sent out
    });
    setTimeout(function() { //shutting off connection after it finished its purpose
        connection.close();
        process.exit(0);
    }, 500);
});
