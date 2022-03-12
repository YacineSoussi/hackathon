### Getting started

```
docker-compose build --pull --no-cache
docker-compose up -d

```

docker-compose exec php bin/console d:s:u --dump-sql
docker-compose exec php bin/console doctrine:schema:update
docker-compose exec php bin/console doctrine:schema:update --force

```

Se rendre dans le dossier client pour lancer le serveur react.

```
# URL SYMFONY
http://127.0.0.1:8001

# URL REACT
http://127.0.0.1:3000

# Env DB
DATABASE_URL="postgresql://postgres:password@db:5432/db?serverVersion=13&charset=utf8"
```
composer require symfonycasts/verify-email-bundle

# for gpg export GPG_TTY=$(tty)

# added "daisyui" cdn to app it permit addition of styled tailwind components