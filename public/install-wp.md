# Installation custom de Wordpress

## Dépots (supermarchés) qui nous seront utiles

- Packagist (le supermarché de PHP) : https://packagist.org/?query=wordpress
- WPackagist (le supermarche de Wordpress) : https://wpackagist.org/search?q=astra&type=any&search=

## Etape 1 Configuration du composer.json

**ATTENTION IL NE FAUT PAS DE COMMENTAIRES DANS LE FICHIER composer.json**

```json
{
    "repositories":[
        {
            "type":"composer",
            "url":"https://wpackagist.org",
            "only": ["wpackagist-plugin/*", "wpackagist-theme/*"]
        }
    ],
    "extra": {
        "wordpress-install-dir": "wp"
    },
    "require": {
        "johnpbloch/wordpress": "^5.6",
        "wpackagist-theme/twentytwentyone": "^1.0",
        "wpackagist-plugin/classic-editor": "*"
    },
    "scripts": {
        "activate-theme": "wp theme activate ",
        "activate-plugins": "wp plugin activate --all",
        "activate-htaccess": "wp rewrite structure '/%year%/%monthnum%/%postname%/' --hard",
        "chmod": [
            "sudo chgrp -R www-data .",
            "sudo find . -type f -exec chmod 664 {} +",
            "sudo find . -type d -exec chmod 774 {} +",
            "touch .htaccess",
            "sudo chmod 755 .htaccess"
        ],
        "wp-install-application-passwords": "wp plugin install application-passwords --activate",
        "wp-install-classic-editor": "wp plugin install classic-editor --activate",
        "wp-install-jwt": "wp plugin install jwt-auth --activate",
        "wp-install-jwt2": "wp plugin install jwt-authentication-for-wp-rest-api --activate"
    }
}

```


## Etape 2 lancer composer
Se placer en ligne de commandes dans le dossier du site web (dossier public dans le cas présent)

Lancer la commande ```composer install```

## Etape 3 SURTOUT ne pas oublier de configurer le fichier .gitignore

- vendor
- wp
- wp-content
- composer.lock
- wp-config.php
- .htaccess

## Etape 4 Création de l'index.php dans la racine du site

```php
<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require __DIR__ . '/wp/wp-blog-header.php';

```

**attention de bien configurer cette ligne si jamais nous n'installez pas wordpress dans un dossier nommé ```wp```"**
```php
require __DIR__ . '/wp/wp-blog-header.php';
```


## Etape 5 créer le fichier wp-config.php (à la racine du site web)
Utiliser le fichier wp/wp-config-sample.php comme modèle de départ

```php
<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpcli' );

/** MySQL database username */
define( 'DB_USER', 'wpcli' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wpcli' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'e0f$~OvFrk55Ry/a1u*8njS2|GSbTEx}BW+Gk2;ckOm] 1]!F* ~5Q h1(.>#d5L');
define('SECURE_AUTH_KEY',  '>$[`7.NI|Y[opvZG$U&|Q^F>Vt$Hm1`+(@V^a2RhJvb<RCIA+7Y-Q##hpnB}Zihz');
define('LOGGED_IN_KEY',    'B|Q{vJG~J<ayyb/K>+`uu8L+v  (/+Nz+BR<c~`ky`9k>@pp*%yEJEXzZlo$njuV');
define('NONCE_KEY',        'y0bBbrW>{-U<y#tC*;,37?FI>s+b)c;S G%?UrjafQ3-Rg/hPw-<q&y-[T@TM&?`');
define('AUTH_SALT',        '[_|1qo6`+7(+ble15t}P2-kOIZ(;+Y)GSv)-bt|c5lZeuQ`#4[n?g_]IqK+Iz.x0');
define('SECURE_AUTH_SALT', '{I4U44by2*-:7W<1QV`q][8[pDo5v&+pn-lRXL%]Uc!}7!|$:s-bzN/.u+KT,)q1');
define('LOGGED_IN_SALT',   '6WM4Ayx!8fqgjH_+Z9oV~c&W3S)Rn0nh#5+uVn]ghN!+4jx:t<+A?HqH4!b? >,q');
define('NONCE_SALT',       'LP2+D$ZVbiM0/|(jgL7+:!%1hdBw49VghMXU@Z8_L-fFJ<Ol?SX.~$7 +?q ^d;{');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
// AJOUT :
//----------------------------
//! url vers la home (la racine) du site wordpress
define('WP_HOME', rtrim ( 'http://localhost/PROMO/TRINITY/speWP/S01/wp-oProfile-MikaSlayki/public', '/' ));


// nous spécifions dans quel dossier sont installés les fichiers de wordpress
define('WP_SITEURL', WP_HOME . '/wp');

define('WP_CONTENT_URL', WP_HOME . '/wp-content');
define('WP_CONTENT_DIR', __DIR__ . '/wp-content');


// on peut installer des plugins/theme directement depuis le backoffice
define('FS_METHOD','direct');
//--------------------------------------------

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

```

**Attention de bien configurer l'url de la racine du site wordpress**

## Etape 6 créer la base de donnée avec adminer (ou autre)

## Etape 7 (si pas déjà installé) Installation du logiciel wp-cli
```sh
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
# ne pas oublier d'appuyer sur la touche entrée
```

## Etape 8, créer le fichier wp-cli.yml

```yml
path: wp
apache_modules:
  - mod_rewrite
```

## Etape 9, lancer la ligne de commande pour installer wordpress
**Ne pas oublie de se placer dans le dossier racine du site wordpress**

Commande : 

```sh
wp core install --url="WORDPRES_URL" --title="WORDPRES_SITE_NAME" --admin_user="WORDPRES_ADMIN_NAME" --admin_password="WORDPRES_ADMIN_PASSWORD" --admin_email="WORDPRES_ADMIN_EMAIL" --skip-email;
```



Exemple commande prof :
```sh
wp core install --url="http://localhost/PROMO/TRINITY/speWP/S01/wp-oProfile-MikaSlayki/public" --title="Démo install wp" --admin_user="mika" --admin_password="mika" --admin_email="mika@mikabuche.com" --skip-email;
```

## Etape 10, lancer les commandes composer "essentielles"
**Ne pas oublie de se placer dans le dossier racine du site wordpress**

```sh
composer run activate-plugins
composer run chmod
```