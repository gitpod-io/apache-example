# Template repo to run the Apache Web Server with PHP and XDebug in Gitpod.io

## Try or Contribute

[![Open in Gitpod](https://gitpod.io/button/open-in-gitpod.svg)](https://gitpod.io#https://github.com/Eetezadi/Gitpod-Apache-PHP-Xdebug)

This is a template repo, you can create your own using this as a template. Or let Gitpod handle the fork on first commit.

## What this does

* Uses the Dockerfile to configure Apache and XDebug (based on Gitpod Image "workspace-full" which includes PHP)
* Runs apache on port 8080
* Added a custom and minimal apache.conf. 
* Follows the Apache logs in the Gitpod Terminal View via multitail
* Adds PHP Xdebug extension to VSCode
* XDebug arguments are passed on the fly from VSCode 

## Terminal Commands to try to control Apache
* `apachectl start` - start Apache Web Server (it's started automatically on workspace launch)
* `apachectl stop` - stop Apache Web Server
* `gp open /var/log/apache2/access.log` - Open Apache access.log in Gitpod editor
* `gp open /var/log/apache2/error.log` - Open Apache error.log in Gitpod editor
* `multitail /var/log/apache2/access.log -I /var/log/apache2/error.log` - View and follow logs in Terminal
