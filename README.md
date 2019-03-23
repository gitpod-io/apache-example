# Example how to run the Apache Web Server in Gitpod.io

## Try or Contribute

open [https://gitpod.io#https://github.com/meysholdt/apache-in-gitpod-example](https://gitpod.io#https://github.com/meysholdt/apache-in-gitpod-example)

## What this Example does

* use the Dockerfile to install Apache via apt-get, because in the Dockerfile we have root access
* create a launch script for apache to...
* run apache in /workspace/
* run apache as gitpod:gitpod
* run apache in forground (not as daemon) so that we can nicely see the logs in Gitpod's Terminal View
* run apache on port 8080, because as unpreviliged process it can't open port 80

## How it looks like

![Screenshot](/screenshot.png)