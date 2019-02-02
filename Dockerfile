FROM fspnetwork/php

WORKDIR /data/www/orion
COPY composer* ./
RUN composer install --no-dev --no-autoloader --no-scripts
COPY . .
RUN cp .env.production .env \
    && chmod -R 777 storage/* bootstrap/cache \
    && composer dump-autoload \
    && php artisan key:generate \
    && php artisan config:cache

VOLUME [ "/data/www/orion" ]
