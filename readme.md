Primeiro criar o arquivo .env

	cp .env.example .env

Executar o Comando

	docker-compose build
	docker-compose up -d

Entrar no Container do Laravel 
	
	docker exec -it laravel-app bash

Executar os comandos

	php artisan migrate

	php artisan db:seed

Acessar o Servidor com 

	http://localhost:8000/