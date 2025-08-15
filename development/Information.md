### Step 1: Create the Laravel project1
First, create the Laravel project using Composer. Make sure to mount a volume from your system to the container, pointing to the directory where the project will be created:
```bash
docker run --rm -it -v PATH:/app -u $(id -u):$(id -g) composer bash
composer create-project laravel/laravel PROJECTNAME "12.*" --prefer-dist
```
or you can try with a single command
```bash
docker run --rm -it -v PATH:/app -u $(id -u):$(id -g) composer create-project laravel/laravel PROJECTNAME "12.*" --prefer-dist
```

### Step 2: Configurate for a local development with docker compose
Fill the enviroment variables on a .env file, use the .env.example as a guide, the most important variable is `APP_SRC_PATH`, this is the path to the project creted with composer on the first step, you can obtain the value for `UID` and `GID` with the comands `id -u` and `id -g`, this is for avoid permission errors.

### Step 3: User container tools
For user composer and artisan commands user the following formats, again user the `UID` and `GID` for the user for avoid permission problems.
```bash
docker compose run --rm --user "${UID}:${GID}" artisan #Rest of the command
docker compose run --rm --user "${UID}:${GID}" composer #Rest of the command
```