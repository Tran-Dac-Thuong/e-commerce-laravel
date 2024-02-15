FROM php:8.1-fpm-alpine

WORKDIR /app

COPY composer.json composer.lock ./

COPY --from=composer/composer:2-bin /composer /usr/bin/composer

RUN composer install

COPY . .

RUN php artisan migrate

RUN php artisan key:generate

EXPOSE 8181

CMD ["php-fpm"]
