# PHP 7.4 with Apache (matches your project)
FROM php:7.4-apache

# System libs for common Laravel extensions
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git \
    libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    libxml2-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install pdo pdo_mysql mbstring tokenizer xml zip gd bcmath \
 && a2enmod rewrite \
 && rm -rf /var/lib/apt/lists/*

# Set Apache DocumentRoot to /public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

# (optional) ensure Laravel can write cache/logs
# COPY . /var/www/html
# RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache