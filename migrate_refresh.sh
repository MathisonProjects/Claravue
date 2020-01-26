#!/bin/bash

php artisan migrate:refresh
php artisan passport:install && php artisan db:seed
rm $(pwd)/storage/app/public/upload/*

