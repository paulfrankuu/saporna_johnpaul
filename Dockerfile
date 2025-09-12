FROM php:8.1-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy project files to container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Install Composer
RUN apt-get update && apt-get install -y unzip git \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Install dependencies (if composer.json exists)
RUN if [ -f composer.json ]; then composer install; fi

# Expose Apache port
EXPOSE 80

CMD ["apache2-foreground"]