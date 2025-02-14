FROM php:8.1-fpm

RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    nodejs \
    curl libzip-dev \
    npm

RUN docker-php-ext-install pdo_mysql zip exif pcntl gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

EXPOSE 8000

CMD npm install && composer install && php artisan serve --host=0.0.0.0 --port=8000
