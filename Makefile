DC=docker-compose

## install : Install project
install:
	make copy-env
	make create-postgres-volume
	make up
	make wait
	cd Backend/MVC/Devops && make copy-env
	cd Backend/MVC/Devops && make composer-install

## Up: Mount the containers
up:
	@$(DC) -f docker-compose.yml up -d --build --remove-orphans

## wait			: Wait for 1 minutes
wait:
	@echo "Waiting for container to be healthy"
	@$(RUN) sleep 1m

## Remove: Stops, remove the containers and their volumes
remove:
	@$(DC) down -v --rmi all --remove-orphans

## Copy .env file
copy-env:
	@$(RUN) cp .env.dist .env

## Be sure that postgres container volume exist
create-postgres-volume:
	@$(RUN) docker volume create --name=postgres.data

## Stop: Stop container without deleting
stop:
	@$(DC) stop

sh-mvc:
	cd Backend/MVC/Devops && make sh

build-mvc:
	@$(DC) -f docker-compose.yml up -d --build mvc
