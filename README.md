## Setup

git clone URL

composer install

php artisan key:generate

cp .env.example .env

Edit .env to update `WEATHER_APP_ID`.


## Start Project

- On Local : Run `php artisan serve` 

- Live : Point the domain to `public` folder


### About Web Pages

Current Weather Page is available at `/home` route.

Next 24 Hour Page is avaible at `/next24` route.

Next 5 Days ( 7 days api isn't available in free account) is available at `/next5days` route.

Temperature Unit is Degree Celsius

