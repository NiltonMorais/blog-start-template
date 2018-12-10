## Instalação
  - Criar arquivo .env a partir da cópia do .env.example:
    - cp .env.example .env
  - Alterar credenciais do banco de dados no arquivo .env:
    - DB_DATABASE, DB_USERNAME, DB_PASSWORD
  - Instalar dependências do composer:
    - composer install
  - Rodar migrations e seeds:
    - php artisan migrate:refresh --seed
  - Rodar servidor php:
    - php artisan serve
  - Abrir rota /admin:
    - http://localhost:8000/admin
  - Realizar login para acessar área protegida:
    - Credenciais do login em UsersTableSeeder  
    


