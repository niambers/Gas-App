# Author: Freddy Roa-Familia

# PHP dependency manager
FROM composer:1.9.3 AS composer

FROM php:7.4.3-cli

# Copies dependency manager into PHP image
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Install RabbitMQ PHP client
RUN apt-get -qq update && apt-get -qq -y install \
    git \
    libzip-dev \
    unzip \
    && docker-php-ext-install \
       sockets \
       zip \
    && composer require php-amqplib/php-amqplib \
    # This section is critical and not working
    && composer update
# Copies files from a source directory into the containers filesystem
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD ["php", "./test.php"]

# Install PDO support
# RUN docker-php-ext-install pdo pdo_mysql
