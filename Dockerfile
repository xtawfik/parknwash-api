FROM php:7.4-apache

# --- Debian Buster is EOL: use archive mirrors so apt works ---
RUN sed -i -e 's/deb.debian.org/archive.debian.org/g' \
           -e 's|security.debian.org|archive.debian.org/|g' /etc/apt/sources.list \
    && echo 'Acquire::Check-Valid-Until "false";' > /etc/apt/apt.conf.d/99no-check-valid-until

# --- OS deps & PHP extensions ---
RUN apt-get update && apt-get install -y --no-install-recommends \
        libzip-dev unzip git curl \
        libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
        libxml2-dev zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring tokenizer xml zip gd bcmath \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

# --- Serve Laravel /public as the docroot ---
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf