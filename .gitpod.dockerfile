FROM gitpod/workspace-full

# install corresponding PHP Xdebug
RUN sudo install-packages php-xdebug

# optional: change document root folder. It's relative to your git working copy.
ENV APACHE_DOCROOT_IN_REPO="www"
