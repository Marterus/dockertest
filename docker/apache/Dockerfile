FROM php:7.2-apache

# PHP extensions
RUN apt-get update && apt-get install -y \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
    && pecl install xdebug-2.6.0 mcrypt-1.0.1 apcu \
    && docker-php-ext-install -j$(nproc) pdo_mysql zip opcache tokenizer iconv mysqli \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-enable apcu \
    && docker-php-ext-enable mcrypt

RUN apt-get install -y zlib1g-dev libicu-dev g++ \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini


RUN curl -sS https://getcomposer.org/installer | php \
        && mv composer.phar /usr/local/bin/ \
        && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

COPY  my.conf /etc/apache2/sites-available/

RUN ln -s /etc/apache2/sites-available/my.conf /etc/apache2/sites-enabled/my.conf

ENV COMPOSER_ALLOW_SUPERUSER 1
WORKDIR /

# Apache modules
RUN a2enmod rewrite
