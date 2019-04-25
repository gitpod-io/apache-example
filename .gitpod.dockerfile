FROM gitpod/workspace-full:branch-apache

ENV x=1

# optional: use a custom apache config.
COPY apache.conf /etc/apache2/apache2.conf

# optional: change apache port
ENV APACHE_PORT=8080

# optional: change document root folder. It's relative to your git working copy.
ENV APACHE_DOCROOT_IN_REPO="www"