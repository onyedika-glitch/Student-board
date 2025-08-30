# Stage 1: Build dependencies with Composer
FROM composer:2 AS vendor

# Stage 2: PHP-FPM + Nginx
FROM php:8.2-fpm

# Install required packages
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    git \
    nginx \
    supervisor \
     libonig-dev \
    zlib1g-dev \
 && docker-php-ext-install pdo pdo_pgsql mbstring bcmath zip

# Set working directory
WORKDIR /var/www/html


# Copy rest of Laravel app
COPY . .

# Copy Nginx and Supervisor configs
COPY docker/nginx.conf /etc/nginx/conf.d/default.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port Render will map
EXPOSE 10000

# Start Supervisor (manages php-fpm + nginx)
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
