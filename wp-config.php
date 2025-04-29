<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'pet_shop' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '(-QL+>})E{ULo.SX5WgGe</yEez4,#F IU91B-Xbt:z5U[:EsBHp033/umi{{@^z' );
define( 'SECURE_AUTH_KEY',  ')>tGojMvnq3f7(c>}+`r R>?9b`7~ps[3,;PixKuEq+}PjI7N}.Pa!*BjyD`uSE)' );
define( 'LOGGED_IN_KEY',    'c(WslCGo k3w:,?SO@AL[5?Wy|agp6,FyzkOW#wd67Pc<u4)pm_d)CM((-y#WeLk' );
define( 'NONCE_KEY',        's1O0nobCsLL4[5_QJ1TCKt4:1;^JTM>X,)p$XJ@1ImZadA#F;KMte52w<!_T/huL' );
define( 'AUTH_SALT',        'PY%:f%Jh}PapnHBO:p4T@4cnP!FAlRAq:FS5*`x]P:,v9Dx4^Pp=F/-Ft4=w>WW%' );
define( 'SECURE_AUTH_SALT', '&EVVfR!q{nK8 P~XcxRcxNA^*OSW#|}*1v:;]>Uu$]H7 rdtR?_XPV(2TV#{zHEI' );
define( 'LOGGED_IN_SALT',   ':XK+ZwQ;XX*:[0ByNzlU1S5)Fz u8/zv[ib1fEQ>JePgQd1cbJ{H)!-kQn3JN[>)' );
define( 'NONCE_SALT',       'i^ea Tb`~l.`_vtH6JLY9Zz<zs[S(z xK!eK-S:e6-%r#)l- W*!Yy.hZ(H1 `GK' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );
define('WP_MEMORY_LIMIT', '512M');
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
