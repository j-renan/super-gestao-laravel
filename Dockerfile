FROM php:7.4-apache

# Install system dependencies
RUN apt-get update -y && apt-get install -y \
    libpq-dev libpng-dev libxml2-dev libzip-dev -y libonig-dev \
    openssl zip unzip git curl libpq-dev postgresql postgresql-client \
    g++ libicu-dev zlib1g-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install intl pdo opcache pdo_pgsql pgsql mbstring exif pcntl bcmath gd

WORKDIR /var/www/super_gestao

RUN chmod -R 777 /var/www/super_gestao

COPY ./composer.json ./

COPY . ./

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8003

EXPOSE 8003


