FROM php:7.4-fpm

# 1. Install system dependencies and Nginx
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

# 2. Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

# 3. Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 4. Set working directory
WORKDIR /var/www/html

# 5. Copy only composer files first (Docker cache optimization)
COPY composer.json composer.lock ./

# 6. Install Composer dependencies in a cached layer
RUN composer install --no-dev --no-interaction --no-autoloader --no-scripts --prefer-dist

# 7. Copy application files
COPY --chown=www-data:www-data . .

# 8. Copy Nginx configuration
COPY .coolify/nginx.conf /etc/nginx/sites-available/default

# 9. Configure PHP-FPM to listen on TCP instead of socket
RUN sed -i 's/listen = \/run\/php\/php7.4-fpm.sock/listen = 127.0.0.1:9000/' /usr/local/etc/php-fpm.d/www.conf

# 10. Create storage directories and set permissions
RUN mkdir -p storage/logs storage/framework/cache storage/framework/sessions storage/framework/views storage/app/public \
    && find storage -name "*.log" -size +10M -delete 2>/dev/null || true \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache \
    && chmod 600 storage/oauth-*.key 2>/dev/null || true

# 11. Clear ALL possible caches completely
RUN rm -rf bootstrap/cache/*.php || true \
    && rm -rf storage/framework/cache/* || true \
    && rm -rf storage/framework/views/* || true \
    && rm -rf storage/framework/sessions/* || true

# 12. Complete Composer installation with authoritative classmap (CRITICAL FIX)
RUN composer install --no-dev --optimize-autoloader --classmap-authoritative

# 13. Laravel setup commands
RUN php artisan storage:link || true \
    && php artisan passport:keys --force || true

# 14. Final optimized autoloader regeneration (CRITICAL FIX)
RUN composer dump-autoload --no-dev --optimize --classmap-authoritative

# 15. Create comprehensive startup script
RUN echo '#!/bin/bash' > /startup.sh \
    && echo 'set -e' >> /startup.sh \
    && echo '' >> /startup.sh \
    && echo 'echo "🚀 Starting Laravel application..."' >> /startup.sh \
    && echo '' >> /startup.sh \
    && echo '# Ensure all directories exist' >> /startup.sh \
    && echo 'mkdir -p /var/www/html/storage/logs' >> /startup.sh \
    && echo 'mkdir -p /var/www/html/storage/framework/cache' >> /startup.sh \
    && echo 'mkdir -p /var/www/html/storage/framework/sessions' >> /startup.sh \
    && echo 'mkdir -p /var/www/html/storage/framework/views' >> /startup.sh \
    && echo 'mkdir -p /var/www/html/bootstrap/cache' >> /startup.sh \
    && echo '' >> /startup.sh \
    && echo '# Fix permissions' >> /startup.sh \
    && echo 'chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache' >> /startup.sh \
    && echo 'chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache' >> /startup.sh \
    && echo '' >> /startup.sh \
    && echo '# Clear any runtime caches to prevent class conflicts' >> /startup.sh \
    && echo 'echo "🧹 Clearing runtime caches..."' >> /startup.sh \
    && echo 'rm -rf /var/www/html/bootstrap/cache/*.php || true' >> /startup.sh \
    && echo 'rm -rf /var/www/html/storage/framework/cache/* || true' >> /startup.sh \
    && echo 'rm -rf /var/www/html/storage/framework/views/* || true' >> /startup.sh \
    && echo '' >> /startup.sh \
    && echo '# Regenerate optimized autoloader to fix User class conflicts' >> /startup.sh \
    && echo 'echo "🔄 Regenerating optimized autoloader..."' >> /startup.sh \
    && echo 'cd /var/www/html' >> /startup.sh \
    && echo 'composer dump-autoload --no-dev --optimize --classmap-authoritative || true' >> /startup.sh \
    && echo '' >> /startup.sh \
    && echo '# Test if Laravel can boot without errors' >> /startup.sh \
    && echo 'echo "🧪 Testing Laravel bootstrap..."' >> /startup.sh \
    && echo 'php artisan --version || echo "⚠️  Laravel bootstrap test failed, but continuing..."' >> /startup.sh \
    && echo '' >> /startup.sh \
    && echo 'echo "🌐 Starting web services..."' >> /startup.sh \
    && echo '' >> /startup.sh \
    && echo '# Start PHP-FPM in background' >> /startup.sh \
    && echo 'php-fpm &' >> /startup.sh \
    && echo '' >> /startup.sh \
    && echo '# Start Nginx in foreground' >> /startup.sh \
    && echo 'nginx -g "daemon off;"' >> /startup.sh \
    && chmod +x /startup.sh

# 16. Expose port
EXPOSE 80

# 17. Use the comprehensive startup script
CMD ["/startup.sh"]