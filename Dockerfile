# Image
FROM ubuntu

# Update dependencies
RUN sudo apt-get update && sudo apt-get -y upgrade

# Setup Apache
RUN apt-get install apache2 -y

# Setup MySQL
RUN echo mysql-server mysql-server/root_password password root | sudo debconf-set-selections
RUN echo mysql-server mysql-server/root_password_again password root | sudo debconf-set-selections
RUN sudo apt-get install mysql-server libapache2-mod-auth-mysql -y

# Setup PHP and PHP Mods
RUN sudo apt-get install php5 libapache2-mod-php5 php5-mcrypt php5-fpm php5-mysql php5-curl php5-gd php5-intl php-pear php5-imagick php5-imap php5-mcrypt php5-memcache php5-ming php5-ps php5-pspell php5-recode php5-sqlite php5-tidy php5-xmlrpc php5-xsl -y

# Setup Nginx
echo "deb http://ppa.launchpad.net/nginx/stable/ubuntu $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/nginx-stable.list
sudo apt-key adv --keyserver keyserver.ubuntu.com --recv-keys C300EE8C
sudo apt-get update -y
sudo apt-get install nginx -y

# Setup Ngrok to easily tunnel port 80
RUN apt-get install ngrok*

# Just a simple label
LABEL "seven.manager"="Seven Manager"
