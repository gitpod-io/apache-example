FROM gitpod/workspace-full

USER root

RUN apt-get update && apt-get -y install apache2

RUN addgroup gitpod www-data
