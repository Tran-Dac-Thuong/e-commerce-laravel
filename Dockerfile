FROM php:8.1-fpm-alpine

ENV APP_NAME=Laravel
ENV APP_ENV=production

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install

COPY . .

RUN php artisan migrate

RUN php artisan key:generate

EXPOSE 80

CMD ["php-fpm"]
