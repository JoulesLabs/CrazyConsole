FROM php:8.2-fpm-alpine

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

# fix work iconv library with alpine
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

RUN pecl install imagick && docker-php-ext-enable imagick


# Configure and enable OPCache extension
RUN docker-php-ext-configure opcache --enable-opcache
RUN docker-php-ext-install opcache
# Add Composer lastest version
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

COPY ./.docker/admin/8.2-fpm/opcache.ini $PHP_INI_DIR/conf.d/
COPY ./.docker/admin/8.2-fpm/php.ini $PHP_INI_DIR/conf.d/

# Copy configuration files
RUN cd $APP_DIR
RUN chown www-data:www-data $APP_DIR
#COPY --chown=www-data:www-data . .
RUN mkdir -p /var/www/admin/bootstrap/cache
RUN chmod -R 775 /var/www/admin/bootstrap/cache

COPY ./.docker/admin/8.2-fpm/init.sh /usr/bin/startx.sh
RUN chmod +x /usr/bin/startx.sh

RUN mkdir -p storage/logs
RUN touch storage/logs/worker.log

RUN chown -R www-data:www-data /var/www/admin
RUN chown -R www-data:www-data /var/www/admin/storage

ENTRYPOINT ["/usr/bin/startx.sh"]