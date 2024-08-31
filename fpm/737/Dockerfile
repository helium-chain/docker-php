FROM php:7.4-fpm-alpine
 
# 设置时区
ENV TZ Asia/Shanghai

# 设置源，提高下载效率
RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories


# 安装系统依赖
RUN apk update && apk --no-cache add \
    autoconf \
    g++ \
    make \
    openssl-dev \
    libzip-dev \
    unzip \
    tzdata \
    libjpeg-turbo-dev \
    libpng-dev \
    libwebp-dev \
    freetype-dev

# 安装Redis扩展
RUN pecl install redis && docker-php-ext-enable redis
 
# 安装PDO MySQL扩展
RUN docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql
 
# 安装opcache扩展
RUN docker-php-ext-install opcache && docker-php-ext-enable opcache
 
# 安装BCMath扩展
RUN docker-php-ext-install bcmath && docker-php-ext-enable bcmath

# 安装gd扩展
RUN docker-php-ext-configure gd --with-jpeg --with-webp --with-freetype \
    && docker-php-ext-install gd

# 安装Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 安装git
RUN apk update && \
    apk upgrade && \
    apk add --no-cache bash git openssh

EXPOSE 9000

ENTRYPOINT ["php-fpm"]