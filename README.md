# booking-app

Uma aplicação simples escrita em PHP + Laravel que registra agendamentos.

# Como subir a aplicação

1. `cp .env.example .env` para criar o arquivo .env . Edite as linhas para configurar seu banco de dados. Exemplo:  

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bookings
DB_USERNAME=username
DB_PASSWORD=password
```
2. `composer install` para instalar as dependências do PHP. `npm install && npm run dev` para instalar e compilar os arquivos de estilo.  
3. `php artisan migrate` para subir as migrações.  
4. `php artisan serve` para servir a aplicação e acesse `localhost:8000` para visualizar no navegador.