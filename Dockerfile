FROM php:7.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev zip wkhtmltopdf \
    libjpeg-dev libfreetype6-dev libxrender1 libfontconfig1 \
    && docker-php-ext-install pdo pdo_mysql mbstring tokenizer zip gd

# Set working directory
WORKDIR /var/www

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . .

# Set permissions (for storage and bootstrap/cache)
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Expose port if needed (only if running PHP directly)
EXPOSE 9000

CMD ["php-fpm"]