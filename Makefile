get_requirements:
	sudo apt-get install php5-cli
	curl -s http://getcomposer.org/installer | php; sudo mv composer.phar /usr/local/bin/composer; bash

get_vendors:
	composer install

init_database:
	-php app/console doctrine:database:create -q -n
	-php app/console doctrine:phpcr:init:dbal --force -q -n
	php app/console doctrine:phpcr:repository:init -n

load_fixtures:
	php app/console doctrine:phpcr:fixtures:load -n

generate_assets:
	php app/console assets:install
	php app/console assetic:dump

set_permissions:
	sudo chown -fR $(USER):www-data *
	sudo chmod -fR 777 app web

update_phpcr:
	app/console doctrine:phpcr:nodes:update --query="SELECT * FROM nt:file" -n
	app/console doctrine:phpcr:nodes:update --query="SELECT * FROM nt:folder" -n
	app/console doctrine:phpcr:nodes:update --query="SELECT * FROM nt:resource" -n