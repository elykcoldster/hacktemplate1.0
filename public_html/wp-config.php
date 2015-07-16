<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'elyk_database');

/** MySQL database username */
define('DB_USER', 'elyk');

/** MySQL database password */
define('DB_PASSWORD', '31turkey');

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
define('AUTH_KEY',         'P3Bv6},FQsBc{pV(E5bpP7IxIg;y+o{~1 ;_8QbO[0E@-,u+julYpAiiu8v}@+%Z');
define('SECURE_AUTH_KEY',  ' U1-#Z<-32p(w-ARs+w&k+i#D<{*~7*cNQm6}i6GgxR,&^cxo=.M,8*L=T+`|R&f');
define('LOGGED_IN_KEY',    '<B~k|#+DtiV$i6BG`jo]iGhSuO.=[]:0y8C|;Os[]K Mu_|6UQ+CU6ZE8bF5nILi');
define('NONCE_KEY',        'n=.,{(<2V.[{vSOgW{7B@P:/+n8j4EG]|l39gt,8,A:3)C`56 rn-Xe`}|jaK;~_');
define('AUTH_SALT',        'h}ls>WR|w)kVul|i<Aju75Nsd2erc+9cy[u:kWlY%pLmH@:W7k<zLjqL,=<%!?w?');
define('SECURE_AUTH_SALT', 'vRMZ)-SW0U_ami8k{u+WI;.;dI|;o>@=PfB*#=1:PR_cr4#_y+g8![!8miQfo=z%');
define('LOGGED_IN_SALT',   '_V+ltJ,8TFYb1*4KVJw=Wv:MBJ562-|o`CU`4-XMV)u-A5yU+jPh67W)oe+T2zr>');
define('NONCE_SALT',       'C%C5:[`SBCN(r)#$vbVc9R dV/$&YKhsB_sKLDNH-@AP]<)v+c ea_BGQX|z!,jn');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_HOME','http://10.16.60.237/public_html');
define('WP_SITEURL','http://10.16.60.237/public_html');