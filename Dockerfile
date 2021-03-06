FROM php:7.2

RUN apt-get update -y && apt-get install -y wget \
  curl \
  git \
  libmcrypt-dev \
  libxml2-dev \
  autoconf \
  supervisor \
  cron \
  zip \
  unzip

RUN rm -rf /var/cache/apt/*

COPY ./.docker/laravel /etc/cron.d/
RUN chmod +x /etc/cron.d/laravel

RUN touch /var/log/cron.log

RUN crontab /etc/cron.d/laravel

WORKDIR /app

COPY . .

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN composer install
COPY .env.example .env
RUN php artisan key:generate

RUN php artisan storage:link

COPY ./.docker/supervisord.conf /etc/supervisord.conf

EXPOSE 8000

ENTRYPOINT ["/usr/bin/supervisord", "-n", "-c",  "/etc/supervisord.conf"]