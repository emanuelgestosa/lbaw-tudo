# Local Development script

php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

rm .env
cp .env.local .env

npm run dev

php artisan serve
