FROM php:8.2-apache

RUN docker-php-ext-install mysqli     && a2enmod rewrite

WORKDIR /var/www/html

COPY . /var/www/html/

RUN if [ -f composer.json ]; then       apt-get update && apt-get install -y --no-install-recommends unzip git       && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"       && php composer-setup.php --install-dir=/usr/local/bin --filename=composer       && composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader       && rm -f composer-setup.php       && apt-get purge -y --auto-remove git unzip       && rm -rf /var/lib/apt/lists/*;     fi

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
