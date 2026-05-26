FROM php:8.2-apache

# 1. Instalar dependencias del sistema y extensiones de PHP necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# 2. Habilitar el módulo rewrite de Apache para las rutas de Laravel
RUN a2enmod rewrite

# 3. Descargar e instalar Composer oficialmente
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Copiar todo el código de tu proyecto al servidor de Apache
WORKDIR /var/www/html
COPY . .

# 5. Instalar dependencias de Laravel sin entorno de desarrollo
RUN composer install --no-dev --optimize-autoloader

# 6. Darle permisos correctos a las carpetas de almacenamiento de Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 7. Configurar Apache para que su raíz sea la carpeta /public de Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# 8. Exponer el puerto por defecto de Render
EXPOSE 80

CMD ["apache2-foreground"]