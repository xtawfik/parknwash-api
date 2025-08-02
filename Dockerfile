#########################################################
#  🎯 PHP 8.1 + wkhtmltopdf preinstalled for Laravel     #
#########################################################

FROM adeliom/php:8.1-fpm-wkhtmltopdf

# 1. Install Redis extension via PECL
RUN pecl install redis \
 && docker-php-ext-enable redis

# 2. Prepare runtime directory
WORKDIR /var/www/html

# 3. Copy your code with preinstalled vendor
COPY --chown=www-data:www-data . .

# 4. Optimize composer autoloader
RUN composer dump-autoload --optimize --classmap-authoritative

# 5. Fix Laravel file permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

# 6. Expose FPM port for Coolify
EXPOSE 9000

# 7. Run as non-root user
USER www-data

# 8. Start PHP‑FPM
CMD ["php-fpm"]