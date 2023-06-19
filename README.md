1) run composer install command.

2) make .env file from the .env.example file. you can copy content from .env.example file.

3) create database and set up the database name in .env file

4) run below command
    php artisan migrate

5) run below command to store data into database.
    php artisan coin:store-api-data
    