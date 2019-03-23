FROM gitpod/workspace-full

USER root

RUN apt-get update && apt-get -y install httpd

RUN addgroup gitpod www-data
