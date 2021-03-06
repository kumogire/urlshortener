# urlshortener
A URL shortener web application in the same vein as bitly, TinyURL, or the now defunct Google URL Shortener.

## Requirements

In order to successfully install and run the application you are going to need the following installed on your local development environment:

- Composer v2
- Docker 20.10.12
- PHP v8.1
- Node v17.4.0
- NPM v8.6.0

# Installation & Running 

## Project setup using the Makefile

1. Download the project from Github - https://github.com/kumogire/urlshortener
2. Open your local CLI and navigate to the project folder
3. Run **make help** for a list of commands
```console
make help
```
4. Run **make all** to run install, setup, server and tests
```console
make all
```
## Project setup using manual CLI commands

### Add a new Token to your .env file (optional)

Normally you would never check your .env file into the repo. I added it to this repo for ease of setup and learning purposes.
If you are not using this code for a learning exercise, you are going to want to change the API_TOKEN that the project comes with:

```console
API_TOKEN=3F290RVY9k8WyJ4ormLK
```
### Modify your ray.php file (optional)
This is another file you wouldn't check in to your repo as it is only needed in dev for debugging code and processes.
If you are going extend this codebase and use Spatie/Ray, which I highly recommend, remember to change the file paths in the ray.php file:

```console
'remote_path' => env('RAY_REMOTE_PATH', '\home\kanderson\urlshortener'),
'local_path' => env('RAY_LOCAL_PATH', '\\wsl.localhost\Ubuntu\home\kanderson\urlshortener'),
```

### Install PHP Dependencies

> **Remember:** You need to be in the root folder of the project to run all the following commands.

```console
composer install
```

### Install NPM Dependencies

```console
npm install
```

### Install Laravel Sail

```console
php artisan sail:install
```

### Configure Bash Alias (optional)

```console
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

### Start Sail

> **Remember:** Make sure that Docker is up and running on your local machine **before** trying to launch Laravel Sail.

```console
sail up
```

Note: You don't have to use the alias, it just makes things simpler. If you don't want to use the alias substitute...

```console
./vendor/bin/sail up
```

...wherever the documentation uses just "sail" in the CLI commands

> **Troubleshooting:** If when running the command 'sail up', you get a 'command not found' message, remove the vendor folder (from the root of you project) and run 'composer update'.

> **Note:** If you need to run commands in the docker container preface the command with 'sail' (if you are using the alias)
> Example:
> ```console
> sail php --version
> 
> sail npm run dev
> ```

### Migrate the database
```console
sail artisan migrate
```

### View Application
The application is now ready to be used, open a browser and go to:

http://localhost

## Extending Functionality

### Key File Locations
If you want to make basic changes to the application, here are the locations to key files:

- Vue Router /resources/js/router.vue
- Vue Layout /resources/js/layouts/App.vue
- Template Blade /resources/views/layouts/vue.blade.php
- Vue Pages /resources/pages/
- Laravel Routes /web.php
- Controllers /app/Http/Controllers
- Models /app/Models
- Laravel Logs /storage/logs/laravel.log

### Application Workflow
The application flow goes something like this:

- Laravel checks the registered routes in /web.php
- Laravel uses a middleware check 'CheckShortcode' to see if the short url is valid, and if so, redirects the user to the corresponding url stored in the database.
- Laravel hands off the view rendering to VUEJS (defined in the /resources/views/layouts/vue.blade.php file)
- Default VUEJS (/resources/js/app.js) loads:
  - Application routes (/resources/js/app.js)
  - Registers (and makes available) application components (/resources/js/components/)
  - Loads application templates (/resources/js/layouts/App.vue) and pages (/resources/js/pages/Home.vue)
- VUEJS (via axios) stores/reads data in the MySQL database using Laravel defined API routes (/routes/api.php)

### Running Tests

#### Stress testing with Artillery

Run PHPUnit (PHP) Unit & Feature test(s)
```console
phpunit 
```

Run a test via the CLI to check how the application perform with many requests a second:
```console
artillery quick -c 5 http://localhost
```

## Further Documentation

- Artillery (Stress Testing) https://www.artillery.io/
- Composer (PHP Package Manager) https://getcomposer.org/
- Docker (Virtualization) https://docs.docker.com/
- Laravel (PHP Framework) https://laravel.com/docs/9.x/
- Laravel Sail (Virtualization) https://laravel.com/docs/9.x/sail
- Makefile (Application Setup) https://www.markdownguide.org/cheat-sheet/
- Markdown (Documentation Markup) https://www.markdownguide.org/cheat-sheet/
- MySQL (Database) https://dev.mysql.com/doc/
- Node (Javascript Framework) https://nodejs.org/en/
- NPM (Node Package Manager) https://www.npmjs.com/
- PHPUnit (PHP Testing Framework) https://phpunit.de/documentation.html
- Spatie/Ray (Local application debugging) https://spatie.be/products/ray
- VUE (Javascript Framework) https://vuejs.org/

