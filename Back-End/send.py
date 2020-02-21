#!/usr/bin/env python
import pika

# Establishes connect to RabbitMQ server
connection = pika.BlockingConnection(pika.ConnectionParameters(host='messaging'))
channel = connection.channel()
# Creates a queue
channel.queue_declare(queue='hello')
# routing_key specifies to which queue the message should go
channel.basic_publish(exchange='', routing_key='hello', body='Hello World!')
print(" [x] Sent 'Hello World!'")
connection.close()
