.PHONY: $(MAKECMDGOALS)
.DEFAULT_GOAL := help

help:
  @printf "\033[33mUsage:\033[0m\n  make [target] [arg=\"val\"...]\n\n\033[33mTargets:\033[0m\n"
  @grep -E '^[-a-zA-Z0-9_\.\/]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[32m%-15s\033[0m %s\n", $$1, $$2}'

all: require setup server test

require:
    @echo "Checking the programs required for the build are installed..."
    REQUIRED_BINS := php composer node npm docker
        $(foreach bin,$(REQUIRED_BINS),\
            $(if $(shell command -v $(bin) 2> /dev/null),$(info Found `$(bin)`),$(error Please install `$(bin)`)))

# `make setup` will be used after cloning or downloading to fulfill
# dependencies, and setup the the project in an initial state.
# This is where you might download rubygems, node_modules, packages,
# compile code, build container images, initialize a database,
# anything else that needs to happen before your server is started
# for the first time

setup:
    @composer install
    @npm install
    @php artisan sail:install

# `make server` will be used after `make setup` in order to start
# an http server process that listens on any unreserved port
#	of your choice (e.g. 8080).
server:
	@./vendor/bin/sail up
    @./vendor/bin/sail artisan migrate

# `make test` will be used after `make setup` in order to run
# your test suite.

test:
  ./vendor/bin/sail artisan test
  artillery quick -c 5 http://localhost
