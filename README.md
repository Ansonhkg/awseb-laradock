# Laradock & AWS Elastic Beanstalk (PHP)

## Cloud Server Side
Configure your server DB settings in
- `.ebextensions` -> `00environmentVariables.config`
- and `.env.production`

## Local Server Side
Change your local database configuration here
- `.env`
For example:
```sh
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=root
DB_PASSWORD=root
```
#### Serve Locally
- Type `php artisan serve` in your root directory

## How it works?
- First, we setup `.env.production` configuration file for the server. This file won't be executed as Laravel will only read from `.env` file. 
- When the app is built, we are in the post-build stage. We then run a script `.ebextensions -> 99delayed_job.config` to rename `.env.production` to `.env` on the server.

## Install Laradock
Clone Laradock inside your PHP project
- `git clone https://github.com/Laradock/laradock.git`
- Enter the laradock folder and rename `env-example` to `.env`.
- Run your containers: `docker-compose up -d nginx mysql` (..redis beanstalk)
Open your project's `.env` file and set the following: (This `.env` file is located inside Laradock folder)
```sh
DB_HOST=mysql
REDIS_HOST=redis
QUEUE_HOST=beanstalkd
```
