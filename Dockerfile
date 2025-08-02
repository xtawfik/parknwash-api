FROM php:7.4-apache

ENV DEBIAN_FRONTEND=noninteractive

# Install system deps and PHP extensions (split with ; to avoid escaping issues)
RUN set -eux; \
    apt-get update; \
    apt-get install -y --no-install-recommends \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libzip-dev \
        libxml2-dev \
        unzip \
        git \
        curl \
        zip; \
    docker-php-ext-configure gd --with-freetype --with-jpeg; \
    docker-php-ext-install -j"$(nproc)" pdo_mysql mbstring tokenizer xml zip gd bcmath; \
    a2enmod rewrite; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# Copy source; you already ship vendor/ in the repo
COPY . .

# Permissions for Laravel caches
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80
CMD ["apache2-foreground"]