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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          'X%ytoGo*V>/ceZH1}8Vul-__qsTvQr[-e:zZ;WXLYWF#g KNB&D_2-6`F/Jcd.CS' );
define( 'SECURE_AUTH_KEY',   'p0chw71Vlbz.%PI?$7CSvqi4y;`g@HI+ptiWf #b s2$q%sUU%`nnB?K<^>Fb8;S' );
define( 'LOGGED_IN_KEY',     '5CtC8>00[[KYS8^LIg+SHc;$l,$UjZ8I$ygZ$3H-?BR-xPU[$]v*BKsrB;jV<G[j' );
define( 'NONCE_KEY',         'V;:Z#>[uhy<U5qqW+}T41]6i_xW]=BL]2:IwJv?aT9%gNzzRsCQ?NnbID1Pm<Qjm' );
define( 'AUTH_SALT',         'R>|LyY,ewi?}7nrC]}FX3OVK:3Tg9YhVA7.X{.*1tPm_O6g[nEZ7$S_`{;2L7cTt' );
define( 'SECURE_AUTH_SALT',  '-SkvRY#/EUUi)od|#Vza_EwBtTSJ4C;rQ<{4pUz@HAQ/fF`,Vd&:u#wsgK22q)y;' );
define( 'LOGGED_IN_SALT',    'ilWdK*89,4D`%s>e.y^[^7B?G[k*c:8YF{-+w~yGY*joj<t`?qYfsLjrZ`m8|rb ' );
define( 'NONCE_SALT',        'X*/I6.xiAN*W~Z(ZUTYokOTa&9UKNd6&0#KfU{OIvB3s#.P}-`tP/d @mGaacKv#' );
define( 'WP_CACHE_KEY_SALT', 'RD*Qw4_Xy[8AF|Fto$GyTRlj@Oj2A?+}ZH0IXOZJ`W]3Uw)IB?OVIykM6tMymyUW' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
