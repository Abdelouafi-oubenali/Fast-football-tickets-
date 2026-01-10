FROM php:8.3-fpm

# تحديث وتثبيت المتطلبات الأساسية
RUN apt-get update && apt-get install -y \
    git \
    curl \
    wget \
    unzip \
    zip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    default-mysql-client \
    && rm -rf /var/lib/apt/lists/*

# تثبيت امتدادات PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd \
    && docker-php-ext-enable pdo_mysql mbstring zip exif pcntl bcmath gd

# تثبيت Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer \
    && chmod +x /usr/local/bin/composer

# تحقق من تثبيت Composer
RUN composer --version

WORKDIR /var/www

# تعيين الأذونات
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

# تعيين PATH بشكل صحيح
ENV PATH="$PATH:/root/.composer/vendor/bin:/var/www/vendor/bin"