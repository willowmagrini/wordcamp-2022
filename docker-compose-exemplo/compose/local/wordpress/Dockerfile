FROM wordpress:6.0.2-php8.0

## install redis extension
RUN printf "no\n" | pecl install redis \
    && printf "no \n"  | pecl install apcu-beta\
    && echo 'extension=redis.so' > /usr/local/etc/php/conf.d/pecl-redis.ini \
    && echo 'extension=apcu.so' > /usr/local/etc/php/conf.d/pecl-apcu.ini 
# install utilities
RUN apt-get update
RUN apt-get install -y less nano vim
RUN rm -rf /var/lib/apt/lists

# install wp-cli
RUN mkdir /opt/wp-cli/ && \
    curl -s -o /opt/wp-cli/wp-cli.phar 'https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar'

COPY compose/local/wordpress/wp-cli--allow-root /usr/local/bin/wp
RUN chmod +x /usr/local/bin/wp

USER www-data

# Fix file permissions
USER root
