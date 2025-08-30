# Stage 1: Build dependencies with Composer
FROM composer:2 AS vendor

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

# Stage 2: PHP runtime
FROM php:8.1-fpm

# Install required PHP extensions
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    git \
 && docker-php-ext-install pdo pdo_pgsql mbstring bcmath zip

WORKDIR /var/www/html

# Copy vendor from Stage 1
COPY --from=vendor /app/vendor ./vendor

# Copy rest of app
COPY . .

# Expose port
EXPOSE 10000

# Start Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
