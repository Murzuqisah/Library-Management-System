# Use an appropriate PHP base image with Apache
FROM php:7.4-apache

# Set working directory
WORKDIR /var/www/html

# Copy application files to the container
COPY ./src /var/www/html
COPY ./config /var/www/html/config
COPY ./assets /var/www/html/assets

# Install dependencies and enable Apache modules
RUN apt-get update \
    && apt-get install -y \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libzip-dev \
        unzip \
        git \
        nano \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql pdo_pgsql zip \
    && a2enmod rewrite

# Set permissions for Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80 (default HTTP port)
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
