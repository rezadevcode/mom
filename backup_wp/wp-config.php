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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'u12246fwn_psb4o');

/** MySQL database username */
define('DB_USER', 'u12246fwn_psb4o');

/** MySQL database password */
define('DB_PASSWORD', 'y57huknvvk633u40c7pioq34edt55m5eoqi6189y');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',       '##(3ljK6KO7ew(iyVEOhXut6XXKt)Ga!S9)Ydi%wZ54j4QbxZThbJpFirxk6wnIY');
define('SECURE_AUTH_KEY',       '!w@0QlnaX82F3S4cOAJnvMbwBSgJ3DslVQdMXTJJJw4nEU#w#M&nnP*AnY8NVsuk');
define('LOGGED_IN_KEY',       '*mahO17&dEXM7PsvbGHt1a#nFi%AiwzUA4fp(6cLmVb&s8WPo9Zq0bQf#DBiqVGZ');
define('NONCE_KEY',       '5LngueUqbpG#izkwg^0ipxJdmY0%1qbUw4w^rQ%6NFFV(KGt88Sz5jVN%)g2jBEH');
define('AUTH_SALT',       '*0Gt*dww3(YTLoYjBvl&VnA(CsA*O7V1kFgmR6#P7FD8x%g1&8lg8*d7^!3OE2lc');
define('SECURE_AUTH_SALT',       '@is8)GuwD9J!@btX9)Z0HQb^qbaMkyZX!i(SnZCH)JSugNY5PYejRz#UWyGx239P');
define('LOGGED_IN_SALT',       'KmW@9x7IIT!tHjZ!*nlnis5B#xYZMl0bqVtKM3S0bN7IOE4!4euvZz!o*5%vsf%t');
define('NONCE_SALT',       '^grI66QvXe!CJq8tk8oF62EJpF&a6FFxTd(RslG505Rzk#T%rOtZ)k9i3&ioC2u5');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
