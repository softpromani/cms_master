# Use PHP 8 with Apache
FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# # Install Node.js
# # First, install the NodeSource Node.js 16.x repo
# RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash -
# # Then install Node.js
# RUN apt-get install -y nodejs

# Optionally install Vite globally (useful for some use cases, but generally, using it via npx is preferred)
# RUN npm install -g vite

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the application files to the container
COPY . /var/www/html

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Composer dependencies (if you want this step to be automated)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Install NPM dependencies (including Vite)
# RUN npm install

# Set permissions for the Laravel application
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Suppress the Apache server name warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Expose port 80 for Apache and 3000 for Vite (if you plan to use Vite's development server)
EXPOSE 80
