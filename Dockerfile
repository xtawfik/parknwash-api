#########################################################
#  🎯 PHP 8.1 + wkhtmltopdf preinstalled for Laravel     #
#########################################################

FROM php:8.0-fpm

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

# 5. Create storage directories and fix permissions
RUN mkdir -p storage/logs storage/framework/cache storage/framework/sessions storage/framework/views storage/app/public \
 && find storage -name "*.log" -size +10M -delete 2>/dev/null || true \
 && chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

# 6. Create storage symlink if it doesn't exist
RUN php artisan storage:link || true

# 7. Create a startup script that ensures permissions
RUN echo '#!/bin/bash' > /ensure-permissions.sh \
 && echo 'mkdir -p /var/www/html/storage/logs /var/www/html/storage/framework/cache /var/www/html/storage/framework/sessions /var/www/html/storage/framework/views' >> /ensure-permissions.sh \
 && echo 'chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache' >> /ensure-permissions.sh \
 && echo 'chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache' >> /ensure-permissions.sh \
 && chmod +x /ensure-permissions.sh

# 7. Expose port 80 for Nginx
EXPOSE 80

# 8. Create a proper startup script
COPY <<EOF /start.sh
#!/bin/bash
# Ensure permissions are correct at startup
/ensure-permissions.sh

# Start PHP-FPM in background
php-fpm &

# Start Nginx in foreground
nginx -g "daemon off;"
EOF

RUN chmod +x /start.sh

# 9. Start both services
CMD ["/start.sh"]