FROM php:8.1-apache

# Dependencias del sistema y limpieza
RUN apt-get update && apt-get install -y \
    unzip git curl libicu-dev libzip-dev zip \
    && rm -rf /var/lib/apt/lists/*

# Extensiones PHP
RUN docker-php-ext-install pdo pdo_mysql intl zip

# Crear directorios de CakePHP si no existen y ajustar permisos
RUN mkdir -p /var/www/html/logs /var/www/html/tmp /var/www/html/tmp/cache /var/www/html/tmp/cache/models /var/www/html/tmp/cache/persistent \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/logs /var/www/html/tmp

# Habilitar mod_rewrite para CakePHP
RUN a2enmod rewrite

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar proyecto
COPY . /var/www/html/

# Permisos (Asegúrate de que logs y tmp tengan permisos de escritura)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/logs /var/www/html/tmp

# Instalar dependencias
RUN composer install --no-dev --optimize-autoloader

# Configurar webroot
RUN sed -i 's!/var/www/html!/var/www/html/webroot!g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80