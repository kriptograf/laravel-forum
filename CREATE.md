**Create project**

Via Composer Create-Project

````
composer create-project --prefer-dist laravel/laravel projectName
````

**Web Server Configuration**

**Pretty URLs**

`Apache`

Laravel includes a `public/.htaccess` file that is used to provide URLs without the index.php front controller in the path. Before serving Laravel with Apache, be sure to enable the mod_rewrite module so the .htaccess file will be honored by the server.

If the `.htaccess` file that ships with Laravel does not work with your Apache installation, try this alternative:

````
Options +FollowSymLinks -Indexes
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
````

`Nginx`

If you are using Nginx, the following directive in your site configuration will direct all requests to the index.php front controller:

````
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
````

**Create Thread**

````
php artisan make:model Thread -mr
````

Create model with resource and controller

Change `.env` file connection to database.

**Create DB**

Call command

````
php artisan migrate
````

**Create model Reply**

````
php artisan make:model Reply -mc
````

**Create Tests**

````
php artisan make:test ThreadsTest
````
