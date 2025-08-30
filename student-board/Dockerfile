# Use official PHP image with extensions
FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo pdo_pgsql

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Generate Laravel cache (config, routes, views)
RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear

# Expose port (Render will map $PORT)
EXPOSE 10000

# Start Laravel's built-in server
CMD php artisan serve --host=0.0.0.0 --port=10000
