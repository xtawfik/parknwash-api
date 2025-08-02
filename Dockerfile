# ─── Stage 1: build dependencies & composer-multi-merge ────────────────
FROM composer:2.6 AS builder

WORKDIR /app
COPY composer.json composer.lock ./
COPY app/Ship/composer.json app/Containers/*/composer.json ./

# ─── Stage 2: runtime (php‑fpm + wkhtmltopdf + PHP extensions) ───────
FROM php:8.1-fpm-bullseye

# Install system deps for wkhtmltopdf and common Laravel libs
RUN apt-get update && apt-get install -y \
    libicu-dev libzip-dev libpng-dev libjpeg-dev libfreetype6-dev zlib1g-dev \
    libxmldom-perl xvfb fontconfig wget \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install gd intl opcache zip pdo pdo_mysql \
  && pecl install redis \
  && docker-php-ext-enable redis

# Install wkhtmltopdf manually (from official binary)
RUN wget -qO /tmp/wk.deb https://github.com/wkhtmltopdf/wkhtmltopdf/releases/download/0.12.6/wkhtmltox_0.12.6-1.bullseye_amd64.deb \
  && dpkg -i /tmp/wk.deb || apt-get install -f -y \
  && ln -s /usr/local/bin/wkhtmltopdf /usr/bin/wkhtmltopdf \
  && rm /tmp/wk.deb

# Disable root
USER www-data

WORKDIR /var/www/html
COPY --from=builder /app/vendor ./vendor
COPY . .

# fix permissions
RUN mkdir -p storage bootstrap/cache \
  && chmod -R 775 storage bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]