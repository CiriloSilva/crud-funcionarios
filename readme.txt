Alguns passos para rodar a aplicação

1 - Installar php (xampp) e composer

2 - Executar composer create-project laravel/laravel example-app (apenas para recortar a pasta vendor)

3 - Criar bd (local ou online)

4 - Executar php artisan key:generate (para criar chave da base64 no arquivo .env)

5 - Ainda no .env colocar o nome do bd criado (junto com usuario e senha caso aja)

6 - Executar php artisan migrate (para realizar as migrations criando das tabelas no bd)

7 - Executar php artisan serve (para rodar o servidor da aplicação)