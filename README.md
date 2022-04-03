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

### Install PHP Dependencies
'''console
composer install
'''

### Install Laravel Sail
'''console
php artisan sail:install
'''

### Configure Bash Alias
'''console
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
'''

### Start Sail
'''console
sail up
'''

Note: You don't have to use the alias, it just makes things simpler. If you don't want to use the alias substitute:

'''console
./vendor/bin/sail up
'''

wherever the documentation uses just "sail" in the CLI commands

### View Application
The application is now ready to be used, open a browser and go to:

http://localhost:8000

## Further Documentation

- [Codeception (Testing)] (https://codeception.com/docs/)
- [Composer (PHP Package Manager)] (https://getcomposer.org/)
- [Docker (Virtualization)] (https://docs.docker.com/)
- [Laravel (PHP Framework)] (https://laravel.com/docs/9.x/)
- [Laravel Sail (Virtualization)] (https://laravel.com/docs/9.x/sail)
- [Markdown (Documentation Markup)] (https://www.markdownguide.org/cheat-sheet/)
- [MySQL (Database)] (https://dev.mysql.com/doc/)
- [Node (Javascript Framework)] (https://nodejs.org/en/)
- [NPM (Node Package Manager)] (https://www.npmjs.com/)
- [VUE (Javascript Framework)] (https://vuejs.org/)

