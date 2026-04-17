#!/bin/sh
set -e

# Run Laravel setup commands at runtime (as www-data)
composer dump-autoload --optimize
php artisan package:discover --ansi || true
php artisan config:cache || true
php artisan migrate --force || true

exec "$@"