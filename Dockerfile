FROM php:8.1-fpm-alpine

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install --production --ignore-engines

COPY . .

RUN php artisan migrate

RUN php artisan key:generate

EXPOSE 80

CMD ["php-fpm"]
