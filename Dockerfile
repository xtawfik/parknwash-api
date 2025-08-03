FROM php:7.4-fpm

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

# 5. Create storage directories and set OAuth key permissions
RUN mkdir -p storage/logs storage/framework/cache storage/framework/sessions storage/framework/views storage/app/public \
 && find storage -name "*.log" -size +10M -delete 2>/dev/null || true \
 && chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache \
 && chmod 600 storage/oauth-*.key 2>/dev/null || true

# 6. Clear Laravel cache
RUN php artisan config:clear || true \
 && php artisan route:clear || true \
 && php artisan view:clear || true \
 && php artisan clear-compiled || true \
 && rm -rf bootstrap/cache/*.php || true

# 7. Create storage symlink and setup Passport keys
RUN php artisan storage:link || true \
 && php artisan passport:keys --force || true \
 && rm -rf bootstrap/cache/*.php || true \
 && rm -rf storage/framework/cache/* || true \
 && rm -rf storage/framework/views/* || true \
 && composer dump-autoload --optimize || true

# 8. Create a startup script that ensures permissions
RUN echo '#!/bin/bash' > /ensure-permissions.sh \
 && echo 'mkdir -p /var/www/html/storage/logs /var/www/html/storage/framework/cache /var/www/html/storage/framework/sessions /var/www/html/storage/framework/views' >> /ensure-permissions.sh \
 && echo 'chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache' >> /ensure-permissions.sh \
 && echo 'chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache' >> /ensure-permissions.sh \
 && echo 'if command -v composer &> /dev/null; then composer dump-autoload --optimize || true; fi' >> /ensure-permissions.sh \
 && chmod +x /ensure-permissions.sh

# 9. Expose port 80 for Nginx
EXPOSE 80

# 10. Create a proper startup script
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