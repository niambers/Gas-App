# PHP dependency manager
FROM composer:1.9.3 AS composer

FROM php:7.4.3-cli
# Copies dependency manager into PHP image
COPY --from=composer /usr/bin/composer /usr/bin/composer
# Install RabbitMQ PHP client
RUN docker-php-ext-install sockets \
 && composer require php-amqplib/php-amqplib
WORKDIR /usr/src/myapp
CMD ["php", "./test.php"]

# Install PDO support
# RUN docker-php-ext-install pdo pdo_mysql
# Copies files from a source directory into the containers filesystem
# COPY . /usr/src/myapp