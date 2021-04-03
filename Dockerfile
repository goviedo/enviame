FROM php:7.3-fpm

COPY composer.lock composer.json /var/www/

WORKDIR /var/www

# Instalación de dependencias
RUN apt-get update && apt-get install -y build-essential libpng-dev libjpeg62-turbo-dev libfreetype6-dev locales zip jpegoptim optipng pngquant gifsicle vim unzip git curl
# Limpiamos la cache
RUN apt-get clean && rm -rf /var/lib/apt/list/*

# Instalamos las extensiones bd y otras necesarias

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl 
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install gd

# Instalamos composer

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Agregamos el usuario para la aplicación

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copiamos la app laravel, es decir su contenido a /var/www
COPY . /var/www

# Establecemos permisos
COPY --chown=www:www . /var/www

# El ususario debe ser www
USER www

# Exponemos los puertos 9000 e iniciamos el servicio php-fpm
EXPOSE 9000
CMD ["php-fpm"]

