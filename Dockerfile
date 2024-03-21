FROM php:apache

RUN echo 'ServerName chromerce-www-1' >> /etc/apache2/apache2.conf

RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y \
    libzip-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install mysqli pdo_mysql \
    && a2enmod rewrite

COPY . /var/www/html

ENV DB_HOST=db
ENV DB_PORT=3306
ENV DB_USER=stage
ENV DB_PASSWORD=password
ENV DB_NAME=stage

EXPOSE 80

CMD ["apache2-foreground"]