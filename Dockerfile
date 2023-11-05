FROM php:8.0-apache

# Устанавливаем Composer в контейнер
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Устанавливаем необходимые расширения PHP, утилиты и включаем модуль Apache
RUN apt-get update && apt-get install -y \
        git \
        unzip \
        libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip \
    && a2enmod rewrite

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Копируем только файлы, необходимые для установки зависимостей
COPY composer.json composer.lock ./

# Копируем оставшиеся файлы проекта
COPY . .

# Копируем конфигурацию Apache
COPY ./docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf
