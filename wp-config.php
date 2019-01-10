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
define('DB_NAME', 'agency_kv');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'QD_J]:| B#T_S~hr|a@vgK1(sB7p,)}(A%e/L|acUc9m: {*pi!flFj3^u*!0jW,');
define('SECURE_AUTH_KEY',  '4C1n;z~<y|b1~ObCo+iYx@O3Ox^xy&m3J2DG0J?wNi//7W)uSW@|D0&0sfMo-U#Y');
define('LOGGED_IN_KEY',    'k2l1>CPfHn5R{8Bd${cc^w42G{cfPm SL^`Gj?FVsk9MaK37P}bkV)H-Ycd|UIcH');
define('NONCE_KEY',        '-O|jAk Hpe>91L?9$!GU.,^Dbfogdt.%*XDg8_}V>Ju{rqhP>|`_MqdNa=Jx&@wQ');
define('AUTH_SALT',        '5c>YA=YPp&Emy%EkF.qKgLeqkd7/cCPv5U_CUlI;t1*eV7G=>2>),DrmCjY_G0U]');
define('SECURE_AUTH_SALT', 'WGV>3338@EMg@GU(rY1_4o?zr_+Dvd|B3Q!R-{W-_QAw=>A}5dh)kt(*SML15.O6');
define('LOGGED_IN_SALT',   'l0<Xz>4db<A`4|B++SO%ZVm0J!tJ/0H4(`Gd6_x6.;hu=SY|w|Zbo=2b|x1pS5,j');
define('NONCE_SALT',       'NDPz- J D:mV.k@P*7dtLu/Q*%-+R}D[@^M_@+YK]1tiXc]cF3sFq(y62AW9)ZVY');

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
