FROM php:7.4-apache
WORKDIR /var/www/html
COPY . .
RUN find . -type d -exec chmod 755 {} \; && \
    find . -type f -exec chmod 644 {} \; && \
    chown -R www-data:www-data .
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf
EXPOSE 80

CMD ["apache2-foreground"]