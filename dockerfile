FROM php:7.2-apache

WORKDIR /var/www/html

#  php 必要なライブラリインストール
# a2enmod rewrite はApacheのmod_rewriteモジュールを有効化 することで
RUN apt update \
  && apt-get install -y zlib1g-dev libpq-dev mariadb-client unzip\
  && docker-php-ext-install zip pdo_mysql mysqli \
  && docker-php-ext-enable mysqli \
  && a2enmod rewrite

# composer インストール
# COPYでは、マルチステージビルドという手法でコンテナ内にComposer（PHPのパッケージ管理ツール。Laravelをインストールする際に使う）をインストールしている
# マルチステージビルドとは、Dockerイメージの一部を別のイメージで使用する手法のこと。
# --from=composer:latestでイメージを指定し、その中の/usr/bin/composerを今回作成するコンテナ内の/usr/bin/composerにコピーしています。
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ファイルのコピー
COPY ./Docker/php/php.ini /usr/local/etc/php/
COPY ./Docker/apache2/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./server ./var/www/html
