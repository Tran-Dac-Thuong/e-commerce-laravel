FROM php:8.1-fpm-alpine

WORKDIR /app

COPY composer.json composer.lock ./

COPY . .

EXPOSE 8181

CMD ["php-fpm"]
