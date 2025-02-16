FROM php:8.3-fpm-alpine

ARG SERVER_ENVIRONMENT
ARG APP_DIR=/var/www/admin

# Setup Working Dir
WORKDIR $APP_DIR

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

# Add Repositories
RUN rm -f /etc/apk/repositories &&\
    echo "http://dl-cdn.alpinelinux.org/alpine/v3.18/main" >> /etc/apk/repositories && \
    echo "http://dl-cdn.alpinelinux.org/alpine/v3.18/community" >> /etc/apk/repositories

# Fix work iconv library with alpine
RUN apk add --no-cache --repository http://dl-cdn.alpinelinux.org/alpine/edge/community/ --allow-untrusted gnu-libiconv
ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php

# Add Build Dependencies
RUN apk add --no-cache \
    php82-pear \
    libwebp-dev \
    libzip-dev \
    libjpeg-turbo-dev \
    libjpeg-turbo \
    libpng-dev \
    libxpm-dev \
    php82-dev gcc \
    zlib-dev \
    curl-dev \
    imagemagick \
    imagemagick-dev \
    freetype-dev \
    icu-dev \
    g++ \
    npm \
    zip

# Configure & Install Extension
RUN docker-php-ext-install -j "$(nproc)" \
    curl \
    pgsql \
    pdo \
    pdo_pgsql \
    bcmath \
    zip

RUN docker-php-ext-configure intl && \
    docker-php-ext-install intl &&\
    docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp && \
    docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-configure pcntl --enable-pcntl \
  && docker-php-ext-install pcntl

# Install Build Tools
RUN apk add --no-cache build-base

# Install Imagick PHP extension
RUN apk update && apk upgrade

RUN apk add git --update --no-cache && \
    git clone https://github.com/Imagick/imagick.git --depth 1 /tmp/imagick && \
    cd /tmp/imagick && \
    git fetch origin master && \
    git switch master && \
    cd /tmp/imagick && \
    phpize && \
    ./configure && \
    make && \
    make install && \
    apk del git && \
    docker-php-ext-enable imagick

# Configure and enable OPCache extension
RUN docker-php-ext-configure opcache --enable-opcache
RUN docker-php-ext-install opcache

# Add Composer latest version
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

# Copy configuration files
COPY ./.docker/admin/8.3-fpm/opcache.ini $PHP_INI_DIR/conf.d/
COPY ./.docker/admin/8.3-fpm/php.ini $PHP_INI_DIR/conf.d/

# Set up working directory
RUN cd $APP_DIR
RUN chown www-data:www-data $APP_DIR

# Create and set permissions for bootstrap/cache
RUN mkdir -p /var/www/admin/bootstrap/cache
RUN chmod -R 775 /var/www/admin/bootstrap/cache

# Copy init script and set permissions
COPY ./.docker/admin/8.3-fpm/init.sh /usr/bin/startx.sh
RUN chmod +x /usr/bin/startx.sh

# Set up storage/logs
RUN mkdir -p storage/logs

# Set permissions for storage
RUN chown -R www-data:www-data /var/www/admin
RUN chown -R www-data:www-data /var/www/admin/storage

ENTRYPOINT ["/usr/bin/startx.sh"]