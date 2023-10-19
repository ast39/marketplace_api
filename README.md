## Configuration

After cloning repository, you will need to change some settings for yourself:
Open the .env.example file and find:
- APP_ENV and set it to LOCAL or PRODUCTION
- APP_DEBUG and set it to TRUE or FALSE
- APP_URL and set it to {YOUR_DOMAIN}
- L5_SWAGGER_CONST_HOST key. Next change this param to https://{YOUR_DOMAIN}/api/v1


## Database

Next you must set the database configuration. 
Open the .env file and find:
- DB_CONNECTION - set mysql or other driver
- DB_HOST - set mysql server IP or 127.0.0.1
- DB_PORT - set mysql port (3306 or 3307)
- DB_DATABASE - set database name
- DB_USERNAME - set database user
- DB_PASSWORD - set database password

## Installation

Now you can open the terminal into the project folder and run thees commands:
- composer install
- mv -v .env.example .env
- php artisan migrate --seed
- php artisan l5-swagger:generate

Now you can use tha API.

## License

MIT license, author: Alexandr Statut (ASt)
