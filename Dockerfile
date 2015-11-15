# Image
FROM ubuntu

RUN /bin/bash -c 'source $HOME/.bashrc ; echo $HOME'

RUN apt-get install apache2