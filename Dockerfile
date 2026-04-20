FROM php:8.1-apache

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl

# Instalar extensiones PHP
RUN docker-php-ext-install pdo pdo_mysql

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar proyecto
COPY . /var/www/html/

# Dar permisos
RUN chown -R www-data:www-data /var/www/html

# 🔥 IMPORTANTE: instalar dependencias
RUN composer install --no-dev --optimize-autoloader

# 🔥 Configurar webroot
RUN sed -i 's!/var/www/html!/var/www/html/webroot!g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80