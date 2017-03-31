# Laradock & AWS Elastic Beanstalk (PHP)

## Server Side
Change your server side database configuration here
- Go to `.ebextensions` and create a edit server database configuration in `00environmentVariables.config`
- Configure your server DB settings in `.env.production`

## Local Development Side
Change your local side database configuration here
- `.env`
#### Serve Locally
- Type `php artisan serve` in your root directory

## How it works?
First, we setup `.env.production` configuration file for the server. This file won't be executed as Laravel will only read from `.env` file. We rename `.env.production` to `.env` on the server using the script `99delayed_job.config` in the `.ebextensions` during the **Post-build** stage. 

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
