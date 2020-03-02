FROM php:7.4-cli
WORKDIR /var/www/html/
COPY . myapp/
WORKDIR myapp
RUN apt-get update && apt-get install -y --no-install-recommends git zip
RUN curl --silent --show-error https://getcomposer.org/installer | php
RUN php composer.phar install
ENTRYPOINT ["php", "index.php"]