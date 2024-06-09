#Composer install and npm install
composer install
npm install
#Clear cache and optimize
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
#Migrate and seed
php artisan migrate
#Start the worker
php artisan queue:work
#Compile the assets
npm run dev
#Unlink and relink storage
php artisan storage:link
