# Author: Freddy Roa-Familia

FROM php:7.4.3
RUN docker-php-ext-install pdo pdo_mysql
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD ["php", "./test.php"]