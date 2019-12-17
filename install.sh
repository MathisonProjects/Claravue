#!/bin/bash

echo -e "\e[32m
 ________________________________________________________________________
|                                                                        |
|              Installation of:                                          |
|                Mathison Projects                                       |
|                 Vue Laravel Clean                                      |
|                                                                        |
|                Author: Jacob Arlo Mathison                             |
|________________________________________________________________________|\e[0m"

cp .env.example .env
if [ ! -d "vendor/" ]
then
	composer install
fi
if [ ! -d "node_modules/" ]
then
	npm install
fi
php artisan key:generate
chmod -R 777 storage/ bootstrap/
 ln -s storage/app/public/upload public

# Set .env
echo -n "DB_HOST [ENTER]: "
read DBHOST
php artisan env:set DB_HOST $DBHOST

echo -n "DB_PORT [ENTER]: "
read DBPORT
php artisan env:set DB_PORT $DBPORT

echo -n "DB_DATABASE [ENTER]: "
read DBDATABASE
php artisan env:set DB_DATABASE $DBDATABASE

echo -n "DB_USERNAME [ENTER]: "
read DBUSERNAME
php artisan env:set DB_USERNAME $DBUSERNAME

echo -n "DB_PASSWORD [ENTER]: "
read DBPASSWORD
php artisan env:set DB_PASSWORD $DBPASSWORD

echo -n "MAIL_HOST [ENTER]: "
read MAILHOST
php artisan env:set MAIL_HOST $MAILHOST

echo -n "MAIL_PORT [ENTER]: "
read MAILPORT
php artisan env:set MAIL_PORT $MAILPORT

echo -n "MAIL_USERNAME [ENTER]: "
read MAILUSERNAME
php artisan env:set MAIL_USERNAME $MAILUSERNAME

echo -n "MAIL_PASSWORD [ENTER]: "
read MAILPASSWORD
php artisan env:set MAIL_PASSWORD $MAILPASSWORD

echo -n "MAIL_ENCRYPTION [ENTER]: "
read MAILENCRYPTION
php artisan env:set MAIL_ENCRYPTION $MAILENCRYPTION

echo -n "NODE_PORT [ENTER]: "
read NODEPORT
php artisan env:set NODE_PORT $NODEPORT

php artisan migrate
php artisan passport:install