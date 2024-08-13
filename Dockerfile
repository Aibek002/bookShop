# Use an official PHP runtime as a parent image
FROM php:8.3-fpm

# Install required PHP extensions
# Install Nginx

RUN apt-get update \
     && docker-php-ext-install mysqli pdo pdo_mysql \
     && docker-php-ext-enable pdo_mysql \
     && apt-get install -y nginx


# Copy Nginx config
COPY nginx/default.conf /etc/nginx/conf.d/default.conf
COPY . /var/www/html
# Check Nginx configuration
RUN nginx -t

# Copy the application code


# Set working directory
WORKDIR /var/www/html

# Set permissions for the web server
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80

# Start Nginx and PHP-FPM
CMD ["sh", "-c", "/usr/local/sbin/php-fpm && service nginx start"]

