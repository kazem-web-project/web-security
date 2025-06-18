FROM php:8.2-apache

# Install PHP extensions
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable allow_url_include and allow_url_fopen in php.ini files
RUN for ini in /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini-production; do \
        sed -i 's/allow_url_include = Off/allow_url_include = On/' "$ini" && \
        sed -i 's/allow_url_fopen = Off/allow_url_fopen = On/' "$ini"; \
    done && \
    cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy app files to Apache's web root
COPY ./Hotel_web/ /var/www/html/

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html