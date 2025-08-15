FROM richarvey/nginx-php-fpm:latest AS final

COPY . /var/www/html
COPY --chmod=750 config/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

WORKDIR /var/www/html
