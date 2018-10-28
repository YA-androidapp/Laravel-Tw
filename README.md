# Laravel-Tw

> $ cd ./GitHub/
>
> laravel new Laravel-Tw

> cd ./Laravel-Tw
>
> createdb -O postgres -U postgres laraveltw

> nano .env

```
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=laraveltw
DB_USERNAME=postgres
DB_PASSWORD=password
```

> $ php artisan migrate
>
> $ php artisan serve
