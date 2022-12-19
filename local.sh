# Local Development script

php artisan config:clear
php artisan cache:clear

rm .env
cp .env.local .env

node run dev

php artisan serve
