<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

require_once __DIR__ . "/../env.php";

function get_env_default(string $name, bool $local_only = false, mixed $default = null): mixed {
  if ($nameValue = getenv($name)) {
    return $nameValue;
  }

  if (isset($default)) {
    return $default;
  }

  return NULL;
}

define('scriptsVersion', get_env_default('2BTALENTS_SCRIPTS_VERSION', false, '1.0.1'));
define('WP_HOME', get_env_default('2BTALENTS_WP_HOME', false, 'http://localhost:8088'));
define('WP_SITEURL', get_env_default('2BTALENTS_WP_SITEURL', false, 'http://localhost:8088'));
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', get_env_default('2BTALENTS_DB_NAME', false, '2btal'));

/** Database username */
define( 'DB_USER', get_env_default('2BTALENTS_DB_USER', false, '2btal'));

/** Database password */
define( 'DB_PASSWORD', get_env_default('2BTALENTS_DB_PASSWORD', false, '2btal'));

/** Database hostname */
define( 'DB_HOST', get_env_default('2BTALENTS_DB_HOST', false, 'db'));

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         get_env_default('2BTALENTS_AUTH_KEY', false, 'put your unique phrase here'));
define( 'SECURE_AUTH_KEY',  get_env_default('2BTALENTS_SECURE_AUTH_KEY', false, 'put your unique phrase here'));
define( 'LOGGED_IN_KEY',    get_env_default('2BTALENTS_LOGGED_IN_KEY', false, 'put your unique phrase here'));
define( 'NONCE_KEY',        get_env_default('2BTALENTS_NONCE_KEY', false, 'put your unique phrase here'));
define( 'AUTH_SALT',        get_env_default('2BTALENTS_AUTH_SALT', false, 'put your unique phrase here'));
define( 'SECURE_AUTH_SALT', get_env_default('2BTALENTS_SECURE_AUTH_SALT', false, 'put your unique phrase here'));
define( 'LOGGED_IN_SALT',   get_env_default('2BTALENTS_LOGGED_IN_SALT', false, 'put your unique phrase here'));
define( 'NONCE_SALT',       get_env_default('2BTALENTS_NONCE_SALT', false, 'put your unique phrase here'));

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

define('WPLANG', get_env_default('2BTALENTS_WPLANG', false, 'ru_RU'));

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', get_env_default('2BTALENTS_WP_DEBUG', false, false));

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
