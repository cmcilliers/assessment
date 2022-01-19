## Assessment

Small API test program written for my interview with Stock2Shop

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

## Docker

To install with [Docker](https://www.docker.com), run following commands:

```
git clone https://github.com/cmcilliers/assessment.git
cd assessment
cp .env.example.docker .env
docker run -v $(pwd):/app composer install
cd ./docker
docker-compose up -d
docker-compose exec php php artisan key:generate
docker-compose exec php php artisan jwt:generate
docker-compose exec php php artisan migrate
docker-compose exec php php artisan db:seed
docker-compose exec php php artisan serve 
```

## API Specification

There are 2 API routes in this project. Namely post /products and get /products.
