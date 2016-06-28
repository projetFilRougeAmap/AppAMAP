@echo off

ECHO "Deploiement de Synfony"


ECHO "Creation de la BDD"
php ./app/console doctrine:database:create --if-not-exists
php ./app/console doctrine:schema:create 
php ./app/console doctrine:schema:update --force

ECHO "CACHE"
php ./app/console cache:clear --env=prod
php ./app/console cache:warmup --env=prod

php ./app/console cache:clear

php bin/console install:config


ECHO "Done."
