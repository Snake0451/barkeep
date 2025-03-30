FROM alpine:latest

WORKDIR /var/www/html/

# Установка временной зоны и базовых утилит
RUN echo "UTC" > /etc/timezone && \
    apk add --no-cache \
    bash \
    zip \
    unzip \
    curl

# Установка PHP 8.4 и необходимых расширений
RUN apk add --no-cache \
    php84 \
    php84-common \
    php84-pdo \
    php84-opcache \
    php84-zip \
    php84-phar \
    php84-iconv \
    php84-cli \
    php84-curl \
    php84-openssl \
    php84-mbstring \
    php84-tokenizer \
    php84-fileinfo \
    php84-json \
    php84-xml \
    php84-xmlwriter \
    php84-simplexml \
    php84-dom \
    php84-session \
    php84-xmlreader \
    php84-pdo_mysql \
    php84-sockets \
    php84-posix \
    php84-pcntl \
    php84-intl && \
    ln -s /usr/bin/php84 /usr/bin/php

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

# Копирование файлов проекта
COPY . .

# Установка зависимостей и Octane
RUN composer install --no-dev --no-interaction --prefer-dist && \
    php vendor/bin/rr get-binary -n && \
    chmod +x rr

# Настройка прав
RUN chown -R nobody:nobody /var/www/html/storage && \
    chmod -R 775 storage bootstrap/cache

EXPOSE 8000

# Запуск Octane с RoadRunner
CMD ["php", "artisan", "octane:start", "--server=roadrunner", "--host=0.0.0.0", "--port=8000"]
