FROM fspnetwork/php

WORKDIR /app
COPY . /app

RUN cp .env.production .env \
    && composer install --no-dev --optimize-autoloader \
    && chmod -R 777 storage/* bootstrap/cache \
    && php artisan key:generate

EXPOSE 8080

CMD php artisan serve --host=0.0.0.0 --port 8080
