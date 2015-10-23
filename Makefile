install-requirements:
	 sudo apt-get install php5-cli
	 curl -s http://getcomposer.org/installer | php; sudo mv composer.phar /usr/local/bin/composer; bash

install-vendors:
	 composer install

install-structure:
	 php app/console doctrine:database:create -q
	 php app/console doctrine:phpcr:init:dbal -q
	 php app/console doctrine:phpcr:repository:init
	 php app/console doctrine:phpcr:fixtures:load

set-permissions:
	 sudo chown -fR $(USER):www-data *
	 sudo chmod -fR 777 app/logs app web
