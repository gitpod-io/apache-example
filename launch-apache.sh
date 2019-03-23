#!/bin/bash

export APACHE_SERVER_NAME=$(gp url 8080 | sed -e s/https:\\/\\/// | sed -e s/\\///)
export APACHE_RUN_DIR="$(pwd)"
export APACHE_PID_FILE="$APACHE_RUN_DIR/apache.pid"
export APACHE_RUN_USER="gitpod"
export APACHE_RUN_GROUP="gitpod"
export APACHE_LOG_DIR="$APACHE_RUN_DIR/logs"

apache2 -D FOREGROUND -e info -f "$APACHE_RUN_DIR/apache.conf"