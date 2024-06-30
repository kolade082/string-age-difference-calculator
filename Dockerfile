FROM php:7.4-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install necessary extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy the application files into the container
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html/


