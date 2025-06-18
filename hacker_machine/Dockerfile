# Use an official Kali Linux base image
FROM kalilinux/kali-dev

# Set environment variables
ENV DEBIAN_FRONTEND=noninteractive

# Install Apache and necessary packages
RUN apt-get update && \
    apt-get install -y apache2 apache2-utils && \
    rm -rf /var/lib/apt/lists/*

# Expose port 80 (HTTP)
EXPOSE 80

# Copy your website files (optional)
COPY ./html/ /var/www/html/

# Command to start Apache when the container runs
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]