#!/usr/bin/env bash
sudo docker compose exec -ti app composer install --no-dev --optimize-autoloader
sudo docker compose exec -ti app php artisan migrate --force