sail = ./vendor/bin/sail

up:
	$(sail) up -d

down:
	$(sail) down

migrate:
	$(sail) php artisan migrate

cache:
	$(sail) php artisan optimize:clear

test:
	$(sail) php artisan test
