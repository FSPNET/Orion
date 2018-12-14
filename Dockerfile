FROM fspnetwork/php

WORKDIR /data/www/orion
COPY . .

RUN cp .env.production .env \
    && composer install --no-dev --optimize-autoloader \
    && chmod -R 777 storage/* bootstrap/cache \
    && php artisan key:generate \
    && php artisan config:cache

VOLUME [ "/data/www/orion" ]
