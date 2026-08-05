FROM php:8.3-cli

# Install dependency
RUN apt-get update && apt-get install -y \
    git unzip zip \
    libzip-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo_mysql gd zip

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

# Fix permission
RUN chmod -R 775 storage bootstrap/cache

# Clear cache
RUN php artisan config:clear || true
RUN php artisan cache:clear || true
RUN php artisan view:clear || true

# 🚀 JALANKAN SERVER (INI KUNCI UTAMA)
CMD php artisan serve --host=0.0.0.0 --port=${PORT}