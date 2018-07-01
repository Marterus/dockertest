FROM composer/composer:php

RUN apt-get update && \
 apt-get install -y php5-intl libicu-dev default-jre && \
 rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo
RUN docker-php-ext-enable pdo

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-enable pdo_mysql

RUN docker-php-ext-install pcntl
RUN docker-php-ext-enable pcntl

RUN docker-php-ext-install gettext
RUN docker-php-ext-enable gettext

RUN pecl install intl
RUN docker-php-ext-install intl
RUN docker-php-ext-enable intl

RUN touch /usr/local/etc/php/conf.d/999-custom.ini
RUN echo date.timezone="Europe/Kiev" >> /usr/local/etc/php/conf.d/999-custom.ini

WORKDIR /var/www

COPY composer.json composer.lock ./

RUN composer install --prefer-source --no-interaction

ENTRYPOINT /bin/bash
CMD ["true"]