# SevenManager [![Build Status](https://travis-ci.org/7rin0/SevenManager.svg?branch=master)](https://travis-ci.org/7rin0/SevenManager)
# Built on Symfony CMF Standard Edition architecture and infrastructure

## Requirements

* composer
* Git 1.6+
* PHP >=5.4
* php5-intl
* phpunit 3.6+ (optional)

## Quick start

### Clone symfony-sonata
- git clone https://github.com/luiseverino-com/symfony-sonata.git
- cd symfony-sonata

### Get Composer & Project dependencies
- curl -s http://getcomposer.org/installer | php
- php composer.phar install

### Init Database / Dbal / Repository / Assetics
**Pick ONE option ONLY!**  
Run in Terminal (CTRL+ALT+T) in symfony-sonata project's root dir.

####  OPTION 1 - Using Composer (quickest way)
- composer quick-start

#### OPTION 2 - Execute one command after another
- php app/console doctrine:database:create
- php app/console doctrine:phpcr:init:dbal
- php app/console doctrine:phpcr:repository:init
- php app/console doctrine:phpcr:fixtures:load
- php app/console fos:user:create admin admin@admin.com admin --super-admin
- php app/console assets:install
- php app/console assetic:dump
 
#### OPTION 3 - Using make command
- make get_requirements
- make get_vendors
- make init_database
- make load_fixtures (purge database and load fixtures)
- make generate_assets
- make set_permissions
  
### Set permissions
 - chmod -R 777 app web
 
     **or**
 
 - [Symfony: The Recommended Way!](http://symfony.com/doc/current/book/installation.html#book-installation-permissions)
    

## Useful commands
#### Import PHPCR Database
- php app/console doctrine:phpcr:workspace:import -p /jcr:root exported_phpcr_database.xml

## Documentation

#### Installing the Standard Edition
 - http://symfony.com/doc/current/cmf/book/installation.html

#### The Symfony CMF Book
 - http://symfony.com/pdf/Symfony_cmf_master.pdf  

#### Coding Standards (Contributing to Symfony)  
 - http://symfony.com/doc/current/contributing/code/standards.html  
