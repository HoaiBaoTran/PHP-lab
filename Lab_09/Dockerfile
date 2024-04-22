FROM php:8.3.4-apache
COPY source-code/ /var/www/html/
RUN docker-php-ext-install pdo pdo_mysql
EXPOSE 80