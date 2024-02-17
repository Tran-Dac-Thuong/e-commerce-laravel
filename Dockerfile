FROM php:8.1-fpm-alpine

WORKDIR /app

COPY composer.json composer.lock ./

COPY . .

ENTRYPOINT ["php", "artisan", "serve"]

EXPOSE 8000
