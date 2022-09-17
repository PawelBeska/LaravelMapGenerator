## Research project

### Start date:

10.09.2022

### End date:

11.09.2022

### Installation proces

Change file name from .env.example to .env (apps/game/.env.example)

Run command <code>docker-compose build</code>

Run command <code>docker-compose up -d</code>

Run command <code>docker exec -it orders_service bash</code>

Run command <code>composer update</code>

Run command <code>php artisan key:generate</code>

Run command <code>php artisan migrate</code>

### Generating maps

Run command <code>docker-compose up -d</code>

Run command <code>php artisan test --filter=MapGenerator</code>

Maps will be generated in <code>public</code> folder

### Example maps

### Testing:

Run command <code>docker-compose up -d</code>

<code>php artisan test</code>


### Documentation:

- 
