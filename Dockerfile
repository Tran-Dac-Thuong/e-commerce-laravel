FROM php:8.1-fpm-alpine

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer1 install 

COPY . .

RUN php artisan migrate

RUN php artisan key:generate

EXPOSE 8181

CMD ["php-fpm"]
