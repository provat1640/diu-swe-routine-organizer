#!/bin/bash

# Copy custom Nginx configuration pointing to public
cp /home/site/wwwroot/nginx.conf /etc/nginx/sites-available/default
service nginx reload

# Ensure storage directories exist and are fully writable
mkdir -p /home/site/wwwroot/storage/framework/{sessions,views,cache}
mkdir -p /home/site/wwwroot/storage/logs
mkdir -p /home/site/wwwroot/bootstrap/cache
mkdir -p /home/site/wwwroot/database

touch /home/site/wwwroot/database/database.sqlite
chmod -R 777 /home/site/wwwroot/storage /home/site/wwwroot/bootstrap/cache /home/site/wwwroot/database

cd /home/site/wwwroot
php artisan migrate --force --no-interaction
