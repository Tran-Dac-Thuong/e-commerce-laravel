FROM php:8.1-fpm-alpine

WORKDIR /app

COPY composer.json composer.lock ./

RUN apk add composer

RUN composer install --production

COPY . .

RUN php artisan migrate

RUN php artisan key:generate

EXPOSE 8080

CMD ["php-fpm"]
