# booking-app

Uma aplicação simples escrita em PHP + Laravel que registra agendamentos.

# Como acessar o projeto

## Dependências
Antes de subir a aplicação, é necessário instalar os seguintes pacotes:
- php-curl
- composer
- node/npm

## Sugestão de banco de dados
Configurar o banco de dados pode ser uma tarefa problemática, então
sugiro os seguintes passos:

1. instalação do pacote php-sqlite3
2. habilite a extensão pdo para o sqlite no php.ini
3. crie um arquivo `bookings.sqlite` dentro da pasta `database`do projeto
4. no arquivo do projeto `/config/database.php`, substitua a linha
`'database' => env('DB_DATABASE', database_path('database.sqlite')),`
para `'database' => database_path('database.sqlite'),`

## Subir a aplicação

1. `cp .env.example .env` para criar o arquivo .env . Edite as linhas
para configurar seu banco de dados. Exemplo:

```
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bookings
```
2. `composer update` para instalar as dependências do PHP. `npm install
&& npm run dev` para instalar e compilar os arquivos de estilo.
3. `php artisan migrate` para subir as migrações.
4, `php artisan key:generate` para gerar a chave criptografada da
aplicação.
4. `php artisan serve` para servir a aplicação e acesse `localhost:8000`
para visualizar no navegador.
