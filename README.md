# Lucky-App Application
## Stack

- Backend
    - PHP 8.2
    - MySQL 8
    - Laravel 12

## Local Installation

Clone the repository and enter the project directory

```shell
  git clone git@github.com:karadjyan/lucky-app.git
  cd lucky-app
```

Create .env file (.env.example already contains the necessary configuration)

```shell
  cp .env.example .env
```

Download composer vendors to have Laravel Sail command
```shell
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

Run the environment (optionally you can configure the sail alias https://laravel.com/docs/12.x/sail#configuring-a-shell-alias)
```shell
  ./vendor/bin/sail up
```

Run the new migrations:
```shell
  ./vendor/bin/sail artisan migrate
```

Generate the application key
```shell
  ./vendor/bin/sail artisan key:generate
```

Add a new host to the /etc/hosts file
```shell
  echo "127.0.0.1 lucky.app" | sudo tee -a /etc/hosts > /dev/null
```

Visit the site in the browser http://lucky.app
