App_path: php_task_tailwebs

step 1:
   installation: cmd: composer install

step 2:
    replace .env.example to .env file

step 3:
    DB Connection:
    default: sqlite connected  File: App_path/database/database.sqlite
    you can configure any other db like mysql or pgsql, etc., in env file

step 4:
    cmd: Composer Migrate

Step 5:
    cmd: php artisan serve


Step 6: 
    Register page. Register Teachers with email and password


Step 7: Login with Registered email and password


Step 8: Teachers Dashboard will Shown