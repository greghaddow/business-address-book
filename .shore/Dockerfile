FROM php:7-apache


RUN apt-get update -q -y && \
    docker-php-ext-install pdo_mysql
RUN a2enmod rewrite

ADD config/apache-dev.conf /etc/apache2/sites-enabled/000-default.conf
ADD config/php.ini /usr/local/etc/php/php.ini

# install composer
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/bin/composer

# We mount the site here using the Volumnes in docker-compose.yml
WORKDIR /shore_site


