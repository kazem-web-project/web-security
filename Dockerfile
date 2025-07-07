FROM php:8.2-apache

# Install PHP extensions
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable allow_url_include and allow_url_fopen in php.ini files
RUN for ini in /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini-production; do \
        sed -i 's/allow_url_include = Off/allow_url_include = On/' "$ini" && \
        sed -i 's/allow_url_fopen = Off/allow_url_fopen = On/' "$ini"; \
    done && \
    cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

# Enable Apache mod_rewrite and SSL
RUN a2enmod rewrite ssl

# Install openssl and enable the default SSL site
RUN apt-get update && apt-get install -y openssl && \
    a2ensite default-ssl

# Generate self-signed cert for testing
RUN mkdir -p /etc/apache2/ssl && \
    openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
        -keyout /etc/apache2/ssl/apache.key \
        -out /etc/apache2/ssl/apache.crt \
        -subj "/C=US/ST=NA/L=Dev/O=Dev/CN=localhost"

# Configure ssl.conf to allow weak ciphers
RUN sed -i 's|SSLCertificateFile.*|SSLCertificateFile /etc/apache2/ssl/apache.crt|' /etc/apache2/sites-available/default-ssl.conf && \
    sed -i 's|SSLCertificateKeyFile.*|SSLCertificateKeyFile /etc/apache2/ssl/apache.key|' /etc/apache2/sites-available/default-ssl.conf && \
    sed -i 's|SSLCipherSuite.*|SSLCipherSuite ALL:@SECLEVEL=0|' /etc/apache2/mods-available/ssl.conf && \
    sed -i 's|#SSLHonorCipherOrder.*|SSLHonorCipherOrder off|' /etc/apache2/mods-available/ssl.conf && \
    sed -i 's|SSLProtocol.*|SSLProtocol all|' /etc/apache2/mods-available/ssl.conf && \
    echo "SSLInsecureRenegotiation on" >> /etc/apache2/mods-available/ssl.conf && \
    echo "SSLStrictSNIVHostCheck off" >> /etc/apache2/mods-available/ssl.conf && \
    echo "SSLSessionTickets on" >> /etc/apache2/mods-available/ssl.conf

# Force Apache to accept HTTP/1.0
RUN echo 'Protocols http/1.0 http/1.1' >> /etc/apache2/apache2.conf

# Enable HTTP TRACE method
RUN echo 'TraceEnable On' >> /etc/apache2/apache2.conf

# Copy app files to Apache's web root
COPY ./Hotel_web/ /var/www/html/

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html
