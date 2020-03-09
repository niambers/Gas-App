# Author: Freddy Roa-Familia
FROM php:7.4-cli
# Install PDO support
RUN docker-php-ext-install pdo pdo_mysql
# Copies files from a source directory into the containers filesystem
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD ["php", "./test.php"]