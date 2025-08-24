#!/usr/bin/bash

docker compose run --rm --user "${UID}:${GID}" composer require barryvdh/laravel-debugbar --dev