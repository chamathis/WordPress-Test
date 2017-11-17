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
define('DB_NAME', 'wp_films');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'abcd');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'doy!FeCF;]=~se4t)B59h;oBMZ$c/[S6yt:B,MoutLq^;fc%!?*}u~M=Jx99ZOS9');
define('SECURE_AUTH_KEY',  'Yfsg}g|Ew/&me~3,XxhER+B6C-jA=a@.G1E)R_v[h#WgxM0PdO$7Nd**g98]+mTv');
define('LOGGED_IN_KEY',    'x@R=]7SROA0h!dNrQ|hZ>m=?MOSKfC!=e9V>|4+[u|9Lar~Z!8Qm1{l/a0>j13Z5');
define('NONCE_KEY',        'TRYF;*y%#;A&IagxM|<R;YK+!1!h,yQGSo98AmX3S6vo0B~@Q+{D/[tm#P0 1?!u');
define('AUTH_SALT',        '^<itI}Jp&/~}KO`eeI-JKL$w:PCig~:3y$(wRU8O9;iG:}?#y)bqKK3O<0ld,;pi');
define('SECURE_AUTH_SALT', 'JK_g@y-m)2GPf=S9=Y)oh-S{zZ*#U;n=|^F a}n-Pf{_!*j9vBu +8JWG%rwom4x');
define('LOGGED_IN_SALT',   '^axC&d]>X(R{;)i4ZSqI)Ty_hTyb(d_jcyjNqKu+a>Ho,<>.m?=r[^b(+9<}u~0&');
define('NONCE_SALT',       '%93)9Eh*[&JP^OQBh]=0b>/OLRdVcPpM1T]*J^^pLZ8biA%&, lr6KS&Iu5buNiZ');

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
