FROM php:8.1-fpm-alpine

VOLUME /tmp

COPY ./E_Commerce /app

RUN apk add composer

RUN composer install

RUN php artisan migrate

ENTRYPOINT ["php", "artisan", "serve"]

EXPOSE 8080