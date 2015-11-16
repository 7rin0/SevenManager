# Image
FROM ubuntu

# Maintainer
MAINTAINER Luis SEVERINO <lfs.severino@gmail.com>

# Metadata
LABEL Description="This image is used to start the seven manager cms" Vendor="Seven Manager" Version=2.0"

# Environment
ENV DEBIAN_FRONTEND noninteractive

# Update dependencies
RUN apt-get update && DEBIAN_FRONTEND=noninteractive sudo apt-get -y upgrade

# Install WGET, Curl && Git
RUN apt-get install wget curl git -y

# Setup Apache
RUN apt-get install apache2 -y

# Setup MySQL
RUN echo mysql-server mysql-server/root_password root | sudo debconf-set-selections
RUN echo mysql-server mysql-server/root_password_again root | sudo debconf-set-selections
RUN apt-get install mysql-server libapache2-mod-auth-mysql -y

# Setup PHP and PHP Mods
RUN apt-get install php5 libapache2-mod-php5 php5-mcrypt php5-fpm php5-mysql php5-cli php5-curl php5-gd php5-intl php-pear php5-imagick php5-imap php5-mcrypt php5-memcache php5-ming php5-ps php5-pspell php5-recode php5-sqlite php5-tidy php5-xmlrpc php5-xsl -y

# Setup Nginx
RUN echo "deb http://ppa.launchpad.net/nginx/stable/ubuntu $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/nginx-stable.list
RUN apt-key adv --keyserver keyserver.ubuntu.com --recv-keys C300EE8C
RUN DEBIAN_FRONTEND=noninteractive apt-get update -y
RUN DEBIAN_FRONTEND=noninteractive apt-get install nginx -y

# Setup Ngrok to easily tunnel port 80
RUN apt-get install ngrok* -y

# Restart Services
RUN service mysql restart
RUN service apache2 restart
RUN service nginx restart

# Install Composer
RUN curl -sS http://getcomposer.org/installer | php; sudo mv composer.phar /usr/local/bin/composer; bash
RUN COMPOSER_PROCESS_TIMEOUT=2000

# Install Project Seven Manager
RUN rm -rf /var/www/SevenManager
WORKDIR /var/www/
RUN git clone https://github.com/7rin0/SevenManager.git
WORKDIR ./SevenManager
RUN composer install  --prefer-source --no-interaction

# Database, Assets and Users
RUN -php app/console doctrine:database:create -q -n
RUN -php app/console doctrine:phpcr:init:dbal --force -q -n
RUN php app/console doctrine:phpcr:repository:init -n
RUN php app/console fos:user:create seven_manager lfs.severino@gmail.com s7ven --super-admin -q
RUN php app/console fos:user:create admin admin@admin.com admin --super-admin -q

# To Exploit
ENTRYPOINT ["top", "-b"]
CMD ["-c"]
EXPOSE 80 443 3306
VOLUME ["/var/www", "/var/log/apache2", "/etc/apache2"]
USER daemon
WORKDIR /