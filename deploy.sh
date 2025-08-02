#!/bin/bash

# Exit on any error
set -e

echo "Starting deployment..."

# Install dependencies
composer install --no-dev --optimize-autoloader --no-interaction

# Generate application key if not exists
if [ -z "$APP_KEY" ]; then
    php artisan key:generate
fi

# Run database migrations
php artisan migrate --force

# Clear and cache config
php artisan config:clear
php artisan config:cache

# Clear and cache routes
php artisan route:clear
php artisan route:cache

# Clear and cache views
php artisan view:clear
php artisan view:cache

# Create storage link if it doesn't exist
php artisan storage:link

# Set proper permissions
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

echo "Deployment completed successfully!" 