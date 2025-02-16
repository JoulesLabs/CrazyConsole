# Default Dockerfile
#
# @link     https://www.hyperf.io
# @document https://hyperf.wiki
# @contact  group@hyperf.io
# @license  https://github.com/hyperf/hyperf/blob/master/LICENSE

FROM hyperf/hyperf:8.3-alpine-v3.19-swoole
LABEL maintainer="Hyperf Developers <group@hyperf.io>" version="1.0" license="MIT" app.name="Hyperf"

##
# ---------- env settings ----------
##
# --build-arg timezone=Asia/Shanghai
ARG timezone

ENV TIMEZONE=${timezone:-"Asia/Shanghai"} \
    APP_ENV=prod \
    SCAN_CACHEABLE=(true)

# Install Supervisor
RUN set -ex \
    && apk update \
    && apk add --no-cache supervisor \
    && mkdir -p /etc/supervisor.d

# update
RUN set -ex \
    # show php version and extensions
    && php -v \
    && php -m \
    && php --ri swoole \
    #  ---------- some config ----------
    && cd /etc/php* \
    # - config PHP
    && { \
        echo "upload_max_filesize=128M"; \
        echo "post_max_size=128M"; \
        echo "memory_limit=1G"; \
        echo "date.timezone=${TIMEZONE}"; \
    } | tee conf.d/99_overrides.ini \
    # - config timezone
    && ln -sf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
    && echo "${TIMEZONE}" > /etc/timezone \
    # ---------- clear works ----------
    && rm -rf /var/cache/apk/* /tmp/* /usr/share/man \
    && echo -e "\033[42;37m Build Completed :).\033[0m\n"

WORKDIR /opt/www

# Composer Cache
# COPY ./composer.* /opt/www/
# RUN composer install --no-dev --no-scripts
RUN curl -sS https://getcomposer.org/installer | \
php -- --install-dir=/usr/bin/ --filename=composer

## Supervisor
# COPY .docker/worker/worker.conf /etc/supervisor/conf.d/worker.conf
COPY .docker/worker/worker.conf /etc/supervisord.d/supervisord.conf
RUN chmod -R 644 /etc/supervisord.d/supervisord.conf
# RUN touch /tmp/supervisor.sock
# RUN chmod 777 /tmp/supervisor.sock
# COPY .docker/worker/php.ini $PHP_INI_DIR/conf.d/

# RUN chown -R www-data:www-data /opt/www \
#     && composer install --no-dev -o && php bin/hyperf.php

# USER www-data
# RUN rm -f /tmp/supervisor.sock

EXPOSE 9501

CMD ["supervisord", "-c", "/etc/supervisord.d/supervisord.conf"]
