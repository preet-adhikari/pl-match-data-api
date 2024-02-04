# Using PHP as the base image
FROM php:8.1

# Set the working directory in the container
WORKDIR /var/www/html

# Install required dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy only the composer files to optimize build caching
COPY composer.json composer.lock ./

# Install project dependencies
RUN composer install --ignore-platform-reqs --no-scripts --no-autoloader

# Copy the rest of the application files
COPY . .

# Generate the Laravel application key
RUN php artisan key:generate

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port if needed (default Laravel's development server port)
EXPOSE 8000

# Command to start the Laravel development server
CMD php artisan serve --host=127.0.0.1 --port=8000

