### Getting started

```
docker-compose build --pull --no-cache
docker-compose up -d

```



```
docker-compose exec php bin/console d:s:u --dump-sql
docker-compose exec php bin/console doctrine:schema:update
docker-compose exec php bin/console doctrine:schema:update --force
```
# URL SYMFONY
http://127.0.0.1:8001

# UTILISATION DE REACT POUR LE RAPPORT 
```
# lancer la commande : git clone git@github.com:corneliusthefirst/hakaton-admin.git client

# npm install 

# npm start

http://127.0.0.1:3000

```

# Env DB
DATABASE_URL="postgresql://postgres:password@db:5432/db?serverVersion=13&charset=utf8"
```
composer require symfonycasts/verify-email-bundle

# for gpg export GPG_TTY=$(tty)

# added "daisyui" cdn to app it permit addition of styled tailwind components