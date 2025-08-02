#########################################################
#  🎯 Target: PHP‑FPM 8.1 + wkhtmltopdf + Laravel 7     #
#########################################################

FROM php:8.1-fpm-bullseye

# 1. Install system deps for Laravel + wkhtmltopdf
RUN apt-get update \
 && DEBIAN_FRONTEND=noninteractive apt-get install --no-install-recommends -y \
      libicu-dev libzip-dev libpng-dev libjpeg-dev libfreetype6-dev zlib1g-dev \
      libxml2-dev libxrender1 fontconfig wget xvfb \
 && rm -rf /var/lib/apt/lists/*

# 2. Enable PHP extensions: GD, intl, opcache, zip, pdo_mysql; Redis via PECL
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install -j$(nproc) gd intl opcache zip pdo pdo_mysql \
 && pecl install redis \
 && docker-php-ext-enable redis

# 3. Install wkhtmltopdf (required by Laravel Snappy / Dompdf)
RUN apt-get update && apt-get install -y curl ca-certificates \
 && curl -L -o /tmp/wkhtmltox.deb https://github.com/wkhtmltopdf/packaging/releases/download/0.12.6-1/wkhtmltox_0.12.6-1.bullseye_amd64.deb \
 && apt-get install -y /tmp/wkhtmltox.deb \
 && rm /tmp/wkhtmltox.deb

# 4. Prepare runtime directory
WORKDIR /var/www/html

# 5. Copy all files, including existing vendor
#    This ensures your CI/Dev had already installed PHP libs
COPY --chown=www-data:www-data . .

# 6. Generate optimized autoloader only if you update code
RUN composer dump-autoload --optimize --classmap-authoritative

# 7. Fix Laravel file permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

# 8. Expose FPM port 9000 for Coolify to proxy to
EXPOSE 9000

# 9. Run as non‑root user
USER www-data

# 10. Start PHP‑FPM
CMD ["php-fpm"]