<?php
define( 'WP_CACHE', true );
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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u365551621_Lf6po' );

/** Database username */
define( 'DB_USER', 'u365551621_WOpqt' );

/** Database password */
define( 'DB_PASSWORD', 'yfVo9cHzjL' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          'G~>Z:5c97.XRc7AS>4?hi*$?RWafya,U:F6L6<y=NDtR!~TsTQlXek-wfZTms/D<' );
define( 'SECURE_AUTH_KEY',   'v:/!LE`)iF{p2h4v?3(7h;@OVo?5>p.8Z>~TVc]gXl|*AdMJWin>+T=B8FhV4}[`' );
define( 'LOGGED_IN_KEY',     '+kEQqq/_zh8_&f`j>[s&ewir++x7m8{XJ 21+8)q=N%(P(vyH=gf=,aCXOw9M?8N' );
define( 'NONCE_KEY',         'q.enn=f:,b0{Z0yd4d>;q5@CD6?+HCU/ _;g_@&I`odq_T8x7. iLnC~6Qi;2hg`' );
define( 'AUTH_SALT',         'bMgu5>-$.W[SE_]u= ym4r>6-:kFa`d2/qc^ZDR@p^]KmpsTqjaP<!D9(6am@Gl9' );
define( 'SECURE_AUTH_SALT',  'hrKgCM`+Y+ok4$|OD-d:(O`19O~UmO6_V5>?H~ZW %;@mawM:/u6U[3|@=) UnBV' );
define( 'LOGGED_IN_SALT',    'w+.U!$byk,*TQD],9&Z,/=T,Xl23pa8Mvd6Rq6).V4_(i xM5O$4AeF;@q$uXY]U' );
define( 'NONCE_SALT',        '_m*eF;cQG8sg7B.lbZ:hMQ*9${{vert-HWXfv`$zaDW.>`]}HV~zImMxzVfFS]3#' );
define( 'WP_CACHE_KEY_SALT', 'wi&C%q)0~~(Zm{Z@(4v9Bk=7?knYbn3+i>10`,&f|6Bdjyi4f kxE404Fp5-b6p:' );


/**#@-*/

/**
 * WordPress database table prefix.
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


/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
