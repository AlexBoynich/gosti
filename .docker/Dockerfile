FROM debian:bookworm-slim as nodejs
RUN groupadd --gid 1000 node \
  && useradd --uid 1000 --gid node --shell /bin/bash --create-home node
ENV NODE_VERSION 20.3.1
WORKDIR /app
COPY front ./
RUN npm install
RUN npm run build

FROM bitnami/nginx:1.25.1-debian-11-r2 as front
WORKDIR /app
COPY .docker/front-nginx.conf /opt/bitnami/nginx/conf/server_blocks/server.conf
COPY --from=nodejs /app/dist ./

FROM debian:bookworm-slim as nodejs-back
RUN groupadd --gid 1000 node \
  && useradd --uid 1000 --gid node --shell /bin/bash --create-home node
ENV NODE_VERSION 20.3.1
WORKDIR /app
COPY back ./
RUN npm install
RUN npm run build

FROM php:8.2-fpm-alpine as back
RUN apt-get update && apt-get install -y docker-php-ext-install pdo_mysql pdo_pgsql pgsql git unzip libpng-dev libjpeg62-turbo-dev && docker-php-ext-configure gd --with-jpeg && docker-php-ext-install exif gd && docker-php-source delete && rm -rf /var/lib/apt/lists/* && rm -rf /var/cache/*
COPY --from=harbor.tomsk-it.ru/dockerhub/library/composer:2.5.8 /usr/bin/composer /usr/bin/composer
COPY .docker/unit-config.json /docker-entrypoint.d/
WORKDIR /app
COPY back /app/
COPY --from=nodejs-back /app/public ./public
RUN composer install
RUN chown -R unit:unit /app/
