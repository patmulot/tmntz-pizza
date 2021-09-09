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
define( 'DB_NAME', 'tmntzpizza' ); //!

/** MySQL database username */
define( 'DB_USER', 'tmntzpizza' ); //!

/** MySQL database password */
define( 'DB_PASSWORD', 'tmntzpizza' ); //!

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
define('AUTH_KEY',         '-M[p61#7FvD~JAN46>%&Qc<)%jxj|1|AH&s?DC;AsE+:Xb?}C&{WLCDZqdr4HFjI');
define('SECURE_AUTH_KEY',  'Org|];kK_ud6IX6{P;`|M|]7hEjL^i%:f| +_Plq6]4lr*:`miKo]5zm%?(3PhrI');
define('LOGGED_IN_KEY',    'PQ#9CiJe~byIsU2/w1amhR: }o`=c3|(=Oi.oPCghK.VfO8hA+KA=xmY(Rk9X5&)');
define('NONCE_KEY',        'Q~,q=VhC9_u(6]W 8[A{-JzevfMd*E6*<c6rE0=qy(x9=3]W35.NDb$:U@G+*4yd');
define('AUTH_SALT',        'b6|9tek-I!,BwgK pm-ALJj7NmyU/}oUI/g+ +=WnH)KUj-o=RL+VGu]mbe7C_3{');
define('SECURE_AUTH_SALT', '1Asai[AT;Ps|,m45Ysiw{b1{#cZ|}*;_!BOia$Yxy1^}A1=P5]Th1CZ]NJS$)!y@');
define('LOGGED_IN_SALT',   'mJ7dvEUaAe+Ah 3J$Xd+z`0:CyG)EW@o ~A7eFf&K97r_L.s|uR1)ar8&2EAOzVs');
define('NONCE_SALT',       '5-@MtpG{Y|6zdQJ?U-oiH]`YP!&!$qTZ^PsO|fiC(e8)a2cHtViTX3f-63do-Jkb');

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
define('WP_HOME', rtrim ( 'http://localhost/neo/mes-travaux-2/TMNTzpizza/public', '/' )); //!

define('WP_SITEURL', WP_HOME . '/wp');
define('WP_CONTENT_URL', WP_HOME . '/content');
define('WP_CONTENT_DIR', __DIR__ . '/content');

define('FS_METHOD','direct');

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
