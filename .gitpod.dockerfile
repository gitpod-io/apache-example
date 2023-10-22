FROM gitpod/workspace-full:latest

# install corresponding PHP Xdebug
RUN sudo install-packages php-xdebug

# Copy the Xdebug configuration into the container
COPY xdebug.ini /etc/php/8.2/cli/conf.d/20-xdebug.ini

# optional: use a custom apache config.
COPY apache.conf /etc/apache2/apache2.conf

# optional: change document root folder. It's relative to your git working copy.
ENV APACHE_DOCROOT_IN_REPO="www"
