FROM php:7.2-apache
COPY src/ /var/www/html/

RUN service apache2 start
EXPOSE 80
