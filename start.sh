#!/bin/bash
set -e

echo "==> Caching config and routes..."
php artisan config:cache
php artisan route:cache

echo "==> Resetting and running all migrations fresh..."
php artisan migrate:fresh --force

echo "==> Seeding database..."
php artisan db:seed --force

echo "==> Starting server on port ${PORT:-10000}..."
php artisan serve --host=0.0.0.0 --port=${PORT:-10000}
