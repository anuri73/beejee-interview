FROM php:7.2-fpm-alpine

# Set defaults for variables used by run.sh
ENV COMPOSER_HOME=/root/.composer

# Install dependencies
RUN apk add --no-cache \
        postgresql-dev \
        libzip-dev \
        zip \
        curl-dev \
        wget \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo pdo_pgsql \
    && docker-php-ext-install curl \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install sockets

# Create Composer directory (cache and auth files) & Get Composer
RUN mkdir -p $COMPOSER_HOME \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY src /var/www/mvc.app

WORKDIR /var/www/mvc.app
