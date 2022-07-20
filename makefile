up:
	docker compose up -d

down:
	docker compose down

clear:
	docker system prune -f

install:
	composer install

update:
	composer update