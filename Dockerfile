FROM debian:buster

RUN apt upudate && \
    apt install -y
        curl \
        vim \
        openssl \
        nginx \
        mariadb-server \
        php-fpm php php-mysql
     && apt-get clean \
     && rm -rf /var/lib/apt/lists/*

COPY srcs/ /tmp/srcs/

# phpmyadmin install
#phpyadminに-Cで展開し、stripcomponentで階層化をフラットにする
RUN mkdir /var/www/html/phpmyadmin \
 && curl -o phpMyAdmin502 https://files.phpmyadmin.net/phpMyAdmin/5.0.2/phpMyAdmin-5.0.2-all-languages.tar.xz \
 && tar -Jxvf phpMyAdmin502 -C /var/www/html/phpmyadmin/ --strip-components 1 \
 && rm -v phpMyAdmin502

# mariadb create database
RUN service mysql start \
 && mysql -u root < /tmp/srcs/set-mysql

# wordpress install
RUN mkdir /var/www/html/wordpress \
 && curl -o wordpress https://wordpress.org/latest.tar.gz \
 && tar -xvzf wordpress -C /var/www/html/wordpress/ --strip-components 1 \
 && rm -v wordpress

# nginx config
COPY /tmp/srcs/default /etc/nginx/sites-available/

# wordpress config
COPY /tmp/srcs/wp-config.php /var/www/html/wordpress/
#RUN chown -R www-data:www-data /var/www/html/wordpress

# SSL
RUN mkdir /etc/nginx/ssl
    && cd /etc/nginx/ssl
    && openssl genrsa -out server.key
    && openssl req -new -key server.key -out server.csr -subj '/C=JP/ST=Tokyo/L=Tokyo/O=stakabay/OU=Web/CN=localhost'
    && openssl x509 -in server.csr -days 3650 -req -signkey server.key > server.crt

EXPOSE 80 443

#コンテナを起動させ続けるためのタスク。
#CMD tail -f /dev/null
CMD bash /tmp/srcs/setting.sh && tail -f /dev/null

