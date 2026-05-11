#!/bin/bash
set -e

echo "==> Caching config and routes..."
php artisan config:cache
php artisan route:cache

echo "==> Checking database state..."

# Check if the migrations table exists
MIGRATIONS_TABLE_EXISTS=$(php artisan tinker --no-interaction <<'EOF'
try {
    \DB::table('migrations')->count();
    echo 'yes';
} catch (\Exception $e) {
    echo 'no';
}
EOF
)

if echo "$MIGRATIONS_TABLE_EXISTS" | grep -q "yes"; then
    echo "==> Migrations table found. Running migrate..."
    php artisan migrate --force
else
    echo "==> No migrations table found. Running migrate:fresh to reset dirty DB state..."
    php artisan migrate:fresh --force
fi

echo "==> Seeding database..."
php artisan db:seed --force

echo "==> Starting server on port ${PORT:-10000}..."
php artisan serve --host=0.0.0.0 --port=${PORT:-10000}
