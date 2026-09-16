FROM php:8.2-apache

RUN apt-get update && apt-get install -y git unzip curl libzip-dev libicu-dev libonig-dev libxml2-dev && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath intl

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && apt-get install -y nodejs

RUN npm install
RUN npm run build

RUN chown -R www-data:www-data storage bootstrap/cache

RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["apache2-foreground"]
