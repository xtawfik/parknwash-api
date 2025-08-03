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

# Install PHP extensions for PHP 7.4
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl \
    && docker-php-ext-install opcache

# Prepare runtime directory
WORKDIR /var/www/html

# Copy your code with preinstalled vendor
COPY --chown=www-data:www-data . .

# Copy Nginx configuration
COPY .coolify/nginx.conf /etc/nginx/sites-available/default

# Configure PHP 7.4 settings
RUN echo "memory_limit = 512M" >> /usr/local/etc/php/conf.d/custom.ini \
 && echo "max_execution_time = 300" >> /usr/local/etc/php/conf.d/custom.ini \
 && echo "upload_max_filesize = 100M" >> /usr/local/etc/php/conf.d/custom.ini \
 && echo "post_max_size = 100M" >> /usr/local/etc/php/conf.d/custom.ini \
 && echo "opcache.enable=1" >> /usr/local/etc/php/conf.d/custom.ini \
 && echo "opcache.memory_consumption=128" >> /usr/local/etc/php/conf.d/custom.ini \
 && echo "opcache.interned_strings_buffer=8" >> /usr/local/etc/php/conf.d/custom.ini \
 && echo "opcache.max_accelerated_files=4000" >> /usr/local/etc/php/conf.d/custom.ini

# Create storage directories and set OAuth key permissions
RUN mkdir -p storage/logs storage/framework/cache storage/framework/sessions storage/framework/views storage/app/public \
 && find storage -name "*.log" -size +10M -delete 2>/dev/null || true \
 && chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache \
 && chmod 600 storage/oauth-*.key 2>/dev/null || true

# Clear Laravel cache
RUN php artisan config:clear || true \
 && php artisan route:clear || true \
 && php artisan view:clear || true \
 && php artisan clear-compiled || true \
 && rm -rf bootstrap/cache/*.php || true

# Setup Passport keys (storage symlink will be created at runtime)
RUN php artisan passport:keys --force || true

# Create a startup script that ensures permissions
RUN echo '#!/bin/bash' > /ensure-permissions.sh \
 && echo 'mkdir -p /var/www/html/storage/logs /var/www/html/storage/framework/cache /var/www/html/storage/framework/sessions /var/www/html/storage/framework/views' >> /ensure-permissions.sh \
 && echo 'chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache' >> /ensure-permissions.sh \
 && echo 'chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache' >> /ensure-permissions.sh \
 && chmod +x /ensure-permissions.sh

# Expose port 80 for Nginx
EXPOSE 80

# Create a proper startup script
COPY <<EOF /start.sh
#!/bin/bash
# Ensure permissions are correct at startup
/ensure-permissions.sh

# Create storage symlink after directory mount is active
echo "🔗 Creating storage symlink..."
cd /var/www/html
php artisan storage:link || echo "⚠️  Storage symlink already exists"

# Start PHP-FPM in background
php-fpm &

# Start Nginx in foreground
nginx -g "daemon off;"
EOF

RUN chmod +x /start.sh

# Start both services
CMD ["/start.sh"]