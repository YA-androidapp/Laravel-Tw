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

> $ php artisan make:auth
>
> $ php artisan migrate
>
> $ php artisan serve

> composer require laravel/socialite

> $ nano config/app.php

コメント行の下に追加

```
        /*
         * Package Service Providers...
         */
        Laravel\Socialite\SocialiteServiceProvider::class
```

```
'aliases' => [
...
    'Socialite' => Laravel\Socialite\Facades\Socialite::class
```

> $ nano config/service.php

```
    'twitter' => [
        'client_id' => env('TWITTER_CLIENT_ID'),
        'client_secret' => env('TWITTER_CLIENT_SECRET'),
        'redirect' => env('TWITTER_CALLBACK_URL'),
    ],
```

> $ nano .env

```
TWITTER_CLIENT_ID=
TWITTER_CLIENT_SECRET=
TWITTER_CLIENT_CALLBACK=/auth/twitter/callback
```

> $ nano route/web.php

```
Route::get('auth/twitter', 'Auth\SocialiteController@redirectToProvider');
Route::get('auth/twitter/callback', Auth\SocialiteController@handleProviderCallback');
Route::get('auth/twitter/logout', 'Auth\SocialiteController@logout');
```

> $ nano app/Http/Controlles/Auth/SocialiteController.php
