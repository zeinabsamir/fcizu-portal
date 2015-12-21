FCI-ZU Portal
==============

## Stack
- PHP
- Apache Server
- MySQL
- Bootstrap 3
- Font Awesome 4
- Git
- Docker

## Installation
- Remove all containers (including non-running containers)

  ```
  docker rm -f `docker ps --no-trunc -aq`
  ```

- Run the application

  ```
  docker-compose up
  ```

- Run the database migrations, open a browser at

  ```
  localhost:8080/db/migrations.php
  ```

- Run the seed file (Test Data), open a browser at

  ```
  localhost:8080/db/seed.php
  ```
