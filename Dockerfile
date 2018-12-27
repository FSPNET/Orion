FROM fspnetwork/php

WORKDIR /data/www/orion
COPY . .
COPY .docker/nginx.conf conf/nginx.conf

RUN cp .env.production .env \
    && chmod -R 777 storage/* bootstrap/cache \
    && composer install --no-dev --optimize-autoloader \
    && php artisan key:generate \
    && php artisan config:cache

VOLUME [ "/data/www/orion" ]
