FROM php:8.1-fpm-alpine

COPY . .

RUN apk add composer

RUN composer install

RUN php artisan migrate

ENTRYPOINT ["php", "artisan", "serve"]

EXPOSE 8000