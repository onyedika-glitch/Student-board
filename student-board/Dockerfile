# Stage 1: Build dependencies with Composer
FROM composer:2 AS vendor

WORKDIR /app

# Copy only composer files first (better cache)
COPY student-board/composer.json student-board/composer.lock ./

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress --prefer-dist

# Stage 2: PHP-FPM + Nginx
FROM php:8.1-fpm

# Install required PHP extensions + Nginx + Supervisor
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    git \
    nginx \
    supervisor \
 && docker-php-ext-install pdo pdo_pgsql mbstring bcmath zip

WORKDIR /var/www/html

# Copy vendor from build stage
COPY --from=vendor /app/vendor ./vendor

# Copy the rest of the Laravel app
COPY student-board/ ./

# Copy configs
COPY docker/nginx.conf /etc/nginx/conf.d/default.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port (Render will map $PORT)
EXPOSE 10000

# Start Supervisor (manages php-fpm + nginx)
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
