FROM php:7.2.8-fpm-stretch


RUN apt-get update && apt-get install -q -y ssmtp mailutils && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mysql mysqli sysvsem

RUN pecl install xdebug-2.5.5 \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "[XDebug]" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_log=/tmp/xdebug.log" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=on" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN echo "hostname=localhost.dev" > /etc/ssmtp/ssmtp.conf \
    && echo "root=andrei.pirjoleanu@emag.ro" >> /etc/ssmtp/ssmtp.conf \
    && echo "mailhub=maildev" >> /etc/ssmtp/ssmtp.conf \
    && echo "sendmail_path=sendmail -i -t" >> /usr/local/etc/php/conf.d/php-sendmail.ini

RUN echo "[Date]" >> /usr/local/etc/php/conf.d/php-sendmail.ini \
    && echo "date.timezone = Europe/Bucharest" >> /usr/local/etc/php/conf.d/php-sendmail.ini

RUN echo "localhost localhost.dev" >> /etc/hosts