# Author: Freddy Roa-Familia

FROM php:7.4-cli
RUN docker-php-ext-install pdo pdo_mysql
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD ["php", "./test.php"]