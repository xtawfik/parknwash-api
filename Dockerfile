#########################################################
#  🎯 PHP 8.1 + wkhtmltopdf preinstalled for Laravel     #
#########################################################

FROM php:8.1-fpm

# Install Nginx and other dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libmcrypt-dev \
    libicu-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

# 2. Prepare runtime directory
WORKDIR /var/www/html

# 3. Copy your code with preinstalled vendor
COPY --chown=www-data:www-data . .

# 4. Copy Nginx configuration
COPY .coolify/nginx.conf /etc/nginx/sites-available/default

# 5. Fix Laravel file permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

# 6. Create storage symlink if it doesn't exist
RUN php artisan storage:link || true

# 7. Expose port 80 for Nginx
EXPOSE 80

# 8. Start both Nginx and PHP-FPM
CMD service nginx start && php-fpm