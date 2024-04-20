# Використовуємо офіційний образ PHP для Laravel
FROM php:8.1-fpm

# Встановлюємо залежності
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install zip pdo pdo_mysql

# Встановлюємо Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Встановлюємо Node.js і npm (якщо потрібно)
# RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
# RUN apt-get install -y nodejs

# Встановлення MySQL
RUN apt-get install -y default-mysql-client

# Копіюємо файли додатку в контейнер
COPY . /var/www/html

# Вказуємо робочий каталог
WORKDIR /var/www/html

# Відкриваємо порт
EXPOSE 8000

# Запускаємо команду для запуску сервера PHP (може бути змінена в залежності від вашого проекту)
CMD bash -c "composer install --no-dev && cp .env.example .env && php artisan key:generate && php artisan serve --host=0.0.0.0"