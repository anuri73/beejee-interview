DC=docker-compose
CONTAINER=mvc
RUN=$(DC) run --rm $(CONTAINER)
EXEC=$(DC) exec $(CONTAINER)
BASH=/bin/bash
CONSOLE=bin/console

## Access the api container via shell
sh:
	$(EXEC) sh

## Execute composer install command in container
composer-install:
	@$(EXEC) composer install --no-scripts --no-suggest -o

## Copy .env file
copy-env:
	@$(EXEC) cp .env.dist .env
