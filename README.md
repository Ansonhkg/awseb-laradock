# Laradock & AWS Elastic Beanstalk (PHP)

## Server Side
Change your server side database configuration here
- Go to `.ebextensions` and create a file called `00environmentVariables.config`
Copy and paste the following

```sh
option_settings:
   - namespace: aws:elasticbeanstalk:application:environment
     option_name: DB_HOST
     value: REPLACETHIS
   - option_name: DB_PORT
     value: REPLACETHIS
   - option_name: DB_NAME
     value: REPLACETHIS
   - option_name: DB_USER
     value: REPLACETHIS
   - option_name: DB_PASS
     value: REPLACETHIS

   - namespace: aws:elasticbeanstalk:container:php:phpini
     option_name: document_root
     value: "/public"
```

- In the root directory, create a file called `env.production` 
- Copy everthing in `.env` and paste it in `env.production`
- Configure your server DB settings in `.env.production`


## Local Development Side
Change your local side database configuration here
- `.env`

### How it works?
First, we setup `.env.production` configuration file for the server. This file won't be executed as Laravel will only read from `.env` file. We rename `.env.production` to `.env` on the server using the script `99delayed_job.config` in the `.ebextensions` during the **Post-build** stage. 

### Install Laradock
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