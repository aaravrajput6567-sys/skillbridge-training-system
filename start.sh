#!/bin/bash
set -e

echo "==> Verifying build assets..."
ls -la /var/www/public/build/ 2>/dev/null || echo "WARNING: public/build/ does not exist!"
ls -la /var/www/public/build/assets/ 2>/dev/null | head -5 || echo "WARNING: no assets found!"

echo "==> Caching config and routes..."
php artisan config:cache
php artisan route:cache

echo "==> APP_URL is: $(php artisan tinker --execute='echo config(\"app.url\");')"
echo "==> APP_ENV is: $(php artisan tinker --execute='echo config(\"app.env\");')"

echo "==> Resetting and running all migrations fresh..."
php artisan migrate:fresh --force

echo "==> Seeding database..."
php artisan db:seed --force

echo "==> Configuring PHP-FPM to pass environment variables..."
sed -i 's/;clear_env = no/clear_env = no/' /usr/local/etc/php-fpm.d/www.conf || true
echo "clear_env = no" >> /usr/local/etc/php-fpm.d/www.conf

echo "==> Starting PHP-FPM..."
php-fpm -D

echo "==> Updating nginx port to ${PORT:-10000}..."
sed -i "s/listen 10000/listen ${PORT:-10000}/" /etc/nginx/sites-available/default

echo "==> Testing nginx config..."
nginx -t

echo "==> Starting nginx on port ${PORT:-10000}..."
nginx -g "daemon off;"
