FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    nodejs \
    npm

# Limpiar cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensiones de PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crear directorio de trabajo
WORKDIR /var/www

# Copiar archivos de composer primero para aprovechar cache de Docker
COPY composer*.json ./

# Instalar dependencias de PHP (sin scripts para evitar errores)
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copiar el resto de archivos
COPY . .

# Ejecutar scripts de composer ahora que tenemos todos los archivos
RUN composer run-script post-autoload-dump

# Cambiar propietario de archivos
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www/storage

# Exponer puerto
EXPOSE 9000

CMD ["php-fpm"]
