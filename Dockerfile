FROM php:7.4-apache
RUN curl -sS https://getcomposer.org/installer | php 
RUN mv composer.phar /usr/bin/composer
RUN a2enmod ssl && a2enmod rewrite

RUN docker-php-ext-install mysqli

EXPOSE 80
EXPOSE 443