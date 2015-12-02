get_requirements:
	sudo apt-get install php5-cli
	curl -s http://getcomposer.org/installer | php; sudo mv composer.phar /usr/local/bin/composer; bash

get_vendors:
	composer install

init_database:
	-php app/console doctrine:database:create -q -n
	-php app/console doctrine:phpcr:init:dbal --force -q -n
	php app/console doctrine:phpcr:repository:init -n
	php app/console fos:user:create seven_manager lfs.severino@gmail.com s7ven --super-admin -q
	php app/console fos:user:create admin admin@admin.com admin --super-admin -q

load_fixtures:
	php app/console doctrine:phpcr:fixtures:load -n

generate_assets:
	php app/console assets:install
	php app/console assetic:dump

set_permissions:
	sudo chown -fR $(USER):www-data *
	sudo chmod -fR 777 app web

update_phpcr:
	php app/console doctrine:phpcr:nodes:update --query="SELECT * FROM nt:file" -n
	php app/console doctrine:phpcr:nodes:update --query="SELECT * FROM nt:folder" -n
	php app/console doctrine:phpcr:nodes:update --query="SELECT * FROM nt:resource" -n
	php app/console doctrine:schema:update --force
	php app/console doctrine:phpcr:nodes:update --query="SELECT * FROM [nt:unstructured]"

export_database:
	php app/console doctrine:phpcr:workspace:export --path / ./seven_manager.xml

read_mapping:
	php app/console doctrine:phpcr:mapping:info

clear_cache:
	sudo rm -rf app/cache/* app/logs/*
	php app/console doctrine:cache:clear-query
	php app/console sonata:cache:flush-all

docker_build:
	docker build .

start_server:
	php app/console server:start 127.0.0.1:7070
