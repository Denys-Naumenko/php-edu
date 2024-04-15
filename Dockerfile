FROM php:8.3-apache

# Install PDO PostgreSQL driver
RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo_pgsql
