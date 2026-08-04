FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo_mysql gd zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

# 🔥 Tambahan penting biar gak error config
RUN php artisan config:clear || true
RUN php artisan cache:clear || true

EXPOSE 8080

# ✅ FIX: JANGAN MIGRATE DI SINI
CMD php -S 0.0.0.0:${PORT} -t public & php artisan migrate --force