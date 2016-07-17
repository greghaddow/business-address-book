htdocs
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

Browse to your site and start adding contacts/organisations

