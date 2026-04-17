FROM php:8.3-fpm

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN apt-get update -qqy

RUN docker-php-ext-install mysqli

RUN install-php-extensions gd xdebug soap exif pdo_mysql zip bcmath mysqli && docker-php-ext-enable pdo_mysql

#RUN apt-get update -qqy && apt-get install -y \
#        libzip-dev \
#        libpng-dev \
#        libxml2-dev \
#        supervisor \
#        libkrb5-dev \
#        libc-client-dev \
#        nmap \
#        jpegoptim --no-install-recommends \
#        optipng \
#        pngquant \
#        gifsicle \
#        libavif-bin \
#        nodejs \
#        npm

#RUN npm install -g svgo

#RUN docker-php-ext-configure gd \
#            --prefix=/usr \
#        docker-php-ext-install gd; \
#        php -r 'var_dump(gd_info());'

#RUN docker-php-ext-configure gd --with-gd --with-webp-dir --with-jpeg-dir \
#        --with-png-dir --with-zlib-dir --with-xpm-dir --with-freetype-dir \
#        --enable-gd-native-ttf

#RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
#        && docker-php-ext-install -j$(nproc) imap \
#        && docker-php-ext-enable imap

RUN rm -rf /var/lib/apt/lists/* \
        && apt-get -qqy autoclean && apt-get -qqy --purge autoremove

#COPY supervisord.conf /etc/supervisord.conf
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

USER 1000:1000

WORKDIR /var/www/html

#ENTRYPOINT ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisord.conf"]