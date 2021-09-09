# 1
créer un dossier dans public/themes/"nomDeMonTheme"

# 2
preciser au .gitignore que le dosier du theme ne foit pas être ignoré

# 3
créer le fichier style.css :
```css
  /*
Theme Name: OSailing
Text Domain: osailing
Description: OSailing
Author: Mika and Julien
Documentation: https://developer.wordpress.org/themes/basics/main-stylesheet-style-css/
*/
```

# 4
créer le fichier index.php
```php
<?php
echo "test";
```

# 5
aller activer le theme sur le backoffice wp

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
wp core install --url="http://localhost/neo/my-projects/wp_projet_theme/public/" --title="projet theme" --admin_user="projet_theme" --admin_password="projet_theme" --admin_email="projet_theme@devwp.com" --skip-email;
```
# 10
**Ne pas oublie de se placer dans le dossier racine du site wordpress**

```sh
composer run activate-plugins
composer run chmod
```

# 11 wp/wp-admin
localhost/...../public/wp/wp-admin
user : projet_theme
pw : projet_theme