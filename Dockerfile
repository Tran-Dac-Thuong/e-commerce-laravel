FROM php:8.1-fpm-alpine

# Install composer:
RUN wget https://raw.githubusercontent.com/composer/getcomposer.org/1b137f8bf6db3e79a38a5bc45324414a6b1f9df2/web/installer -O - -q | php -- --quiet
RUN mv composer.phar /usr/local/bin/composer

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install 

COPY . .

RUN php artisan migrate

RUN php artisan key:generate

EXPOSE 8080

CMD ["php-fpm"]
