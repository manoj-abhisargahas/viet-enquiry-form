# 1. Use the official PHP image with Apache web server pre-installed
FROM php:8.2-apache

# 2. Install and enable the mysqli extension for you plain PHP code.
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# 3. Copy all your local project files into the container web directory
COPY . /var/www/html/

# 4. Open the default web server port
EXPOSE 80