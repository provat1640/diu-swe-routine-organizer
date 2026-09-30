#!/bin/bash

# Copy custom Nginx configuration pointing to public
cp /home/site/wwwroot/nginx.conf /etc/nginx/sites-available/default
service nginx reload

# Ensure .env exists from production.env
cp /home/site/wwwroot/production.env /home/site/wwwroot/.env

# Ensure storage directories exist and are fully writable
mkdir -p /home/site/wwwroot/storage/framework/{sessions,views,cache}
mkdir -p /home/site/wwwroot/storage/logs
mkdir -p /home/site/wwwroot/bootstrap/cache
mkdir -p /home/site/wwwroot/database

if [ ! -f /home/site/wwwroot/database/database.sqlite ]; then
    touch /home/site/wwwroot/database/database.sqlite
fi

chmod -R 777 /home/site/wwwroot/storage /home/site/wwwroot/bootstrap/cache /home/site/wwwroot/database

cd /home/site/wwwroot
php artisan config:clear
php artisan migrate --force --no-interaction
