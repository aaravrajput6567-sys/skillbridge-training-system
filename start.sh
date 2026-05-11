#!/bin/bash
set -e

echo "==> Caching config and routes..."
php artisan config:cache
php artisan route:cache

echo "==> Resetting and running all migrations fresh..."
php artisan migrate:fresh --force

echo "==> Seeding database..."
php artisan db:seed --force

echo "==> Starting PHP-FPM..."
php-fpm -D

echo "==> Updating nginx port to ${PORT:-10000}..."
sed -i "s/listen 10000/listen ${PORT:-10000}/" /etc/nginx/sites-available/default

echo "==> Starting nginx..."
nginx -g "daemon off;"
