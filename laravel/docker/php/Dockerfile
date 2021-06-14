FROM php:7.4-fpm
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libzip-dev \
        git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install -j$(nproc) exif \
    && docker-php-ext-install -j$(nproc) zip \
    && docker-php-ext-install -j$(nproc) pcntl

RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable exif
RUN docker-php-ext-enable gd
RUN docker-php-ext-enable zip
RUN docker-php-ext-enable pcntl
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


