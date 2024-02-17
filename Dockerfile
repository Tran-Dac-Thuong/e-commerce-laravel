FROM php:8.1-fpm-alpine

WORKDIR /app

COPY composer.json composer.lock ./

COPY . .

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install

ENTRYPOINT ["php", "artisan", "serve"]

EXPOSE 8000
