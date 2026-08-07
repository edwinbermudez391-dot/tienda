FROM php:8.2-apache

# 1. Instalar dependencias del sistema y Node.js (para Tailwind CSS)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev \
    nodejs \
    npm

# 2. Instalar extensiones de PHP necesarias para Laravel y Supabase (PostgreSQL)
RUN docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# 3. Habilitar el módulo de Apache (vital para las rutas de Laravel)
RUN a2enmod rewrite

# 4. Configurar Apache para que lea directamente la carpeta /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 5. Instalar Composer (el gestor de paquetes de PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6. Establecer la carpeta de trabajo
WORKDIR /var/www/html

# 7. Copiar todos los archivos de tu proyecto al servidor
COPY . .

# 8. Instalar dependencias sin ejecutar scripts automáticos (evita errores si faltan credenciales en el build)
RUN composer install --optimize-autoloader --no-dev --no-scripts

# 9. Compilar el diseño con Node.js
RUN npm install
RUN npm run build

# 10. Crear el enlace simbólico del storage y dar permisos de seguridad
RUN php artisan storage:link
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache