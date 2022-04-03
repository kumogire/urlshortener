# urlshortener
A URL shortener web application in the same vein as bitly, TinyURL, or the now defunct Google URL Shortener.

## Requirements

In order to successfully install and run the application you are going to need the following installed on your local development environment:

- Composer v2
- Docker 20.10.12
- PHP v8.1
- Node v17.4.0
- NPM v8.6.0

## Installation & Running

1. Download the project from Github - https://github.com/kumogire/urlshortener
2. Open your local CLI and navigate to the project folder
3. Continue with the installation instructions

### Install PHP Dependencies

> **Remember:** You need to be in the root folder of the project to run these commands.

```console
composer install
```

### Install Laravel Sail

```console
php artisan sail:install
```

### Configure Bash Alias

```console
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

### Start Sail

> **Remember:** Make sure that Docker is up and running before trying to launch Laravel Sail.

```console
sail up
```

Note: You don't have to use the alias, it just makes things simpler. If you don't want to use the alias substitute:

```console
./vendor/bin/sail up
```

Wherever the documentation uses just "sail" in the CLI commands

> **Troubleshooting:** If when running the command 'sail up', you get a 'command not found' message, remove the vendor folder (from the root of you project and run 'composer update'.

> **Note:** If you need to run commands in the docker container preface the command with 'sail' (if you are using the alias)
> Example:
> ```console
> sail php --version\
> 
> sail npm run dev
> ```

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
- Models app/Models

### Application Workflow
The application flow goes something like this:

- Laravel checks the registered routes in /web.php
- Laravel hands off the view rendering to VUE's routes/layouts/pages (defined in the /resources/views/layouts/vue.blade.php file)
- VUE then communicates to the routes defined in api.php which calls the controller/models to perform the required business logic and database queries.

## Further Documentation

- Codeception (Testing) https://codeception.com/docs/
- Composer (PHP Package Manager) https://getcomposer.org/
- Docker (Virtualization) https://docs.docker.com/
- Laravel (PHP Framework) https://laravel.com/docs/9.x/
- Laravel Sail (Virtualization https://laravel.com/docs/9.x/sail
- Markdown (Documentation Markup) https://www.markdownguide.org/cheat-sheet/
- MySQL (Database) https://dev.mysql.com/doc/
- Node (Javascript Framework) https://nodejs.org/en/
- NPM (Node Package Manager) https://www.npmjs.com/
- VUE (Javascript Framework) https://vuejs.org/

