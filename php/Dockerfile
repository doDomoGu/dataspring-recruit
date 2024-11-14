FROM php:8.3-cli-alpine

# 安装构建工具
RUN apk add --no-cache \
    autoconf \
    gcc \
    g++ \
    make \
    oniguruma-dev \
    icu-dev \
    freetype-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    libzip-dev \
    tzdata
    
WORKDIR /srv

