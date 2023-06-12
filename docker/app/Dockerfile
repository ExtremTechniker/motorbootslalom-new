FROM php:8.2-fpm

RUN apt update && \
    apt install git zip gzip htop libicu-dev -y

RUN docker-php-ext-install intl pdo pdo_mysql

COPY docker/app/99-php.ini /usr/local/etc/php/conf.d/

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN usermod -u 1000 www-data && \
    groupmod -g 1000 www-data && \
    chown -R 1000:1000 /var/www/

USER 1000:1000