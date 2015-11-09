# Built on Symfony CMF Standard Edition architecture and infrastructure

## Requirements

* composer
* Git 1.6+
* PHP >=5.3.9
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
    
    
## Documentation

#### Installing the Standard Edition
 - http://symfony.com/doc/current/cmf/book/installation.html

#### The Symfony CMF Book
 - http://symfony.com/pdf/Symfony_cmf_master.pdf  

#### Coding Standards (Contributing to Symfony)  
 - http://symfony.com/doc/current/contributing/code/standards.html  

#### Block's documentation
 - http://symfony.com/doc/current/cmf/bundles/block/index.html  
 - https://sonata-project.org/bundles/block/master/doc/index.html

## Contributing
Thanks to
[everyone who has contributed](https://github.com/symfony-cmf/standard-edition/contributors) already.