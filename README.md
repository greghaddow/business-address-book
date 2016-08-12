Address Book
======

A Symfony project created on July 16, 2016, 6:40 pm.

PHP 7, Symfony 3, Sonata Admin 3

Git clone to your chosen folder location

Update your app/config/parameters.yml file - parameters.yml.dist has reference
Make a database if necessary and add details to parameters

Run composer install (getcomposer if you need it)
```
bin/console assets:install
```
(this should be run from the server instance if using docker/vagrant)

```
bin/console doctrine:schema:update --force
```
This will create your database models

Change permissions of cache and logs:
```
chmod -R 777 var/cache
chmod -R 777 var/logs
```

enable mod_rewrite or equivalent and set up webserver.
e.g. in nginx:
```
index app_dev.php;
try_files $uri $uri/ /app_dev.php?$args;
```

nginx full setup file with fastcgi:
```
server {
    listen 80;

    root /opt/business-address-book/web;
    index app_dev.php;

    server_name bab.local;
        try_files $uri $uri/ /app_dev.php?$args;

        # set expiration of assets to MAX for caching
        location ~* \.(ico|css|js)(\?[0-9]+)?$ {
                expires max;
                log_not_found off;
        }


        location ~* \.php$ {

        include /etc/nginx/fastcgi_params;
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_read_timeout 300;
        fastcgi_index app_dev.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;

        }

}
```

Browse to your site and start adding contacts/organisations

There is also a sample dockerfile and apache config and php.ini settings in the .shore folder (.shore is a custom dockerised development environment I use - don't ask)
