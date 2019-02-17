docker build -t auth0-laravel-web-app .
docker run --rm -it -v $(pwd)/.env:/home/app/.env auth0-laravel-web-app php artisan key:generate
docker run --env-file .env -p 8000:8000 -it auth0-laravel-web-app 
echo "changes"
<<<<<<< HEAD
<<<<<<< HEAD
more changes
=======
echo different changes
>>>>>>> b3
ddaf
=======
more changeeee
>>>>>>> b5
