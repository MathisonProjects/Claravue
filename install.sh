cp .env.example .env
composer install
php artisan key:generate
npm install
chmod -R 777 storage/ bootstrap/

echo "You need to set your email, password, and DB info..."

# php artisan passport:install
# ln -s MANAGESITENAME/storage/app/public/upload MANAGESITENAME/public