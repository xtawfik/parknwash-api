FROM serversideup/php:8.0-fpm-nginx

# Add labels for better identification
LABEL maintainer="parknwash-api"
LABEL version="1.0"
LABEL description="ParknWash API Laravel Application"

# Copy application files
COPY --chown=www-data:www-data . /var/www/html

# Switch to www-data user (recommended by ServersideUp)
USER www-data

# Create storage symlink if it doesn't exist
RUN php artisan storage:link || true

# Optimize Laravel (only if .env exists)
RUN if [ -f .env ]; then \
        php artisan config:cache || true; \
        php artisan route:cache || true; \
        php artisan view:cache || true; \
    fi