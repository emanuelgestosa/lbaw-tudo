echo "Deploying Website"

php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

rm .env
cp .env.production .env

npm run dev

# Login In Docker
docker login git.fe.up.pt:5050

./upload_image.sh


#
#docker run -it -p 8000:80 --name=lbawYYXX -e DB_DATABASE="lbawYYXX" -e
# DB_SCHEMA="lbawYYXX" -e DB_USERNAME="lbawYYXX" -e DB_PASSWORD="PASSWORD"
# git.fe.up.pt:5050/lbaw/lbawYYYY/lbawYYXX # Replace with your group's image name


