FROM php:8.2-apache

# Install PHP extensions
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy app files to Apache's web root
COPY ./Hotel_web/ /var/www/html/

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html
