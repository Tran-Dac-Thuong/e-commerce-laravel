FROM php:8.1-fpm-alpine

WORKDIR /app

COPY composer.json composer.lock ./

# Workaround 
ENV COMPOSER_VERSION=1
RUN unlink /usr/local/bin/composer && ln -s /usr/local/bin/composer${COMPOSER_VERSION:-2} /usr/local/bin/composer 

COPY . .

RUN php artisan migrate

RUN php artisan key:generate

EXPOSE 8181

CMD ["php-fpm"]
