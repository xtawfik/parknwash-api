FROM php:7.4-apache

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && \
    apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    libxml2-dev \
    unzip \
    git \
    curl \
    zip && \
    docker-php-ext-configure gd \
        --with-freetype-dir=/usr/include/freetype2 \
        --with-jpeg-dir=/usr/include && \
    docker-php-ext-install \
        pdo \
        pdo_mysql \
        mbstring \
        tokenizer \
        xml \
        zip \
        gd \
        bcmath && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . .

RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80