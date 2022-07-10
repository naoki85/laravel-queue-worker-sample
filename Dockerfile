FROM php:8.1-fpm-buster
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

ENV COMPOSER_ALLOW_SUPERUSER=1 COMPOSER_HOME=/composer

COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

RUN apt-get update && \
    apt-get -y install git unzip libzip-dev libicu-dev libonig-dev && \
    docker-php-ext-install intl pdo_mysql zip bcmath opcache

WORKDIR /work
COPY --chown=www-data:www-data ./ ./

RUN composer install

CMD ["php", "artisan", "serve", "--host", "0.0.0.0"]
