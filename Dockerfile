FROM php:8.1-fpm-alpine

WORKDIR /app

COPY composer.json composer.lock ./

RUN cp /usr/local/bin/composer2 /usr/local/bin/composer && composer install

COPY . .

RUN php artisan migrate

RUN php artisan key:generate

EXPOSE 8181

CMD ["php-fpm"]
