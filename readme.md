A basic app for managing todo tasks built using Laravel 4.2 and Ember.js 1.10.0.

First, run composer install  

Check the database settings in app/config/local/database.php and change them if necessary.  
A database called "todos_app" under localhost is expected.    

Now run:  
php artisan migrate --seed

For the frontend run:  
npm i  
npm run prod