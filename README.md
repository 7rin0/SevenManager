# SevenManager [![Build Status](https://travis-ci.org/7rin0/SevenManager.svg?branch=master)](https://travis-ci.org/7rin0/SevenManager)
# Built on Symfony CMF Standard Edition architecture and infrastructure

## Requirements
* composer
* Git 1.6+
* PHP >=5.5
* php5-intl
* phpunit 3.6+ (optional)

### Clone SevenManager repository
- git clone https://github.com/7rin0/SevenManager.git
- cd SevenManager

### Get Composer & Project dependencies
- curl -s http://getcomposer.org/installer | php
- sudo mv composer.phar /usr/local/bin/composer
- composer install --prefer-source -n --profile

### Prepare database and generate fixtures and assets
- php app/console doctrine:database:create
- php app/console doctrine:phpcr:init:dbal --force
- php app/console doctrine:phpcr:repository:init
- php app/console doctrine:schema:update --force
- php app/console doctrine:phpcr:fixtures:load -n
- php app/console fos:user:create admin admin@admin.com admin --super-admin
- php app/console assets:install
- php app/console assetic:dump
- make run_server (optional)

# Admin URL
http://{HOST}/admin (eg: http://127.0.0.1:7070/admin)
 
### Set permissions
 - chmod -R 777 app web
     **or**
 - [Symfony: The Recommended Way!](http://symfony.com/doc/current/book/installation.html#book-installation-permissions)
