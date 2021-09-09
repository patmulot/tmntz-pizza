# 1
copier le dossier dans le repo du projet et le renommer en "public"

# 2
deplacer le .gitignore dans la racine (au niveau du dossier .git)

# 3
```composer install```
```composer update``` (si besoin)

# 4
verifier le .gitignore

# 5
verifier index.php

# 6
renseigner le wp.config

# 7
créer la base de donnée

# 8 (si pas déjà installé)
```sh
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
```

# 9
installer wordpress : 
( remplir les informations concernant le site )
```sh
wp core install --url="http://localhost/neo/my-projects/TMNTzpizza/public" --title="TMNTzPizza" --admin_user="tmntzpizza" --admin_password="tmntzpizza" --admin_email="tmntzpizza@devwp.com" --skip-email;
```
# 10
**Ne pas oublie de se placer dans le dossier racine du site wordpress**

```sh
composer run activate-plugins
composer run chmod
```

# 11 wp/wp-admin
localhost/...../public/wp/wp-admin
user : patdmin
pw : patdmin