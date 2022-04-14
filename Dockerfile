FROM php:latest

RUN pecl install redis \
    && docker-php-ext-enable redis \
    && mkdir /var/www/html/SEOMonitor 
