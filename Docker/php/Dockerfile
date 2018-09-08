FROM php:7.2-fpm

RUN apt-get update && \
    apt-get install -y nginx locate && \
    updatedb && service nginx start

RUN docker-php-ext-install mbstring tokenizer mysqli pdo_mysql