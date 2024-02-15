# FROM php:8.1-fpm-alpine

# WORKDIR /app

# COPY composer.json composer.lock ./

# RUN composer install --production

# COPY . .

# RUN php artisan migrate

# RUN php artisan key:generate

# EXPOSE 8080

# CMD ["php-fpm"]

# Sử dụng một hình ảnh cơ bản có PHP và Composer
FROM php:7.4-fpm

# Cài đặt các gói phụ thuộc cần thiết
RUN apt-get update && \
    apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libonig-dev

# Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Thiết lập và cài đặt các phần mềm bổ sung cho Laravel
RUN docker-php-ext-install pdo_mysql zip && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug

# Thiết lập thư mục làm việc
WORKDIR /var/www/html

# Sao chép mã nguồn ứng dụng vào container
COPY . .

# Cài đặt các gói PHP của Composer
RUN composer install --optimize-autoloader --no-dev

# Thiết lập quyền và chạy các lệnh Laravel
RUN chown -R www-data:www-data storage bootstrap/cache && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Mở cổng để truy cập ứng dụng
EXPOSE 9000

# CMD để khởi chạy PHP-FPM khi container được triển khai
CMD ["php-fpm"]
