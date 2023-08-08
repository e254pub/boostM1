FROM php:8.1.1-fpm-buster

RUN apt-get update
RUN docker-php-ext-install pdo pdo_mysql

CMD ["php-fpm"]