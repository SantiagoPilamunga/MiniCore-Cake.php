FROM php:8.1-apache

# Dependencias del sistema
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libicu-dev \
    libzip-dev \
    zip

# Extensiones PHP necesarias
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    intl \
    zip

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar proyecto
COPY . /var/www/html/

# Permisos
RUN chown -R www-data:www-data /var/www/html

# 🔥 AQUÍ DEBE FUNCIONAR BIEN (sin || true)
RUN composer install --no-dev --optimize-autoloader

# Configurar webroot
RUN sed -i 's!/var/www/html!/var/www/html/webroot!g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80