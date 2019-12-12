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
define( 'DB_NAME', 'timespac_prod_2019' );

/** MySQL database username */
define( 'DB_USER', 'timespac_dev' );

/** MySQL database password */
define( 'DB_PASSWORD', 'o[hoVkUr9wZPFL' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'NUYZh)er)<r&RgpmAjU:qH_rN{}j9R.kVIz@a=v?F x=_T4$h+Z*@B#0?i;>ecQ#' );
define( 'SECURE_AUTH_KEY',  '4_P>6F MeqG0AKHqCJ/R,B7-k)=r:8N_lW< _nHu:T+%J%+&<cjGamQvS=m|wK@Z' );
define( 'LOGGED_IN_KEY',    'y-;-rZt}eIR8@4&wKgh5h)raqivi;u* ``L0fsQymgc:es9Y0]@jH|DF87z4=>dJ' );
define( 'NONCE_KEY',        'jSa%(#uHx;$K=N|qX8,ODdqkis`-)-6@8[AUJ`yDu~xrk!P&tG=>3hj4bn3ZA,BB' );
define( 'AUTH_SALT',        ' f{~Ky1fIE~`>1&yVv)I`k&jUn$<6mdFEP&-aqa5wjOqgg+![P_7Wz58;smUydz5' );
define( 'SECURE_AUTH_SALT', '6%QyO 5%02A)>ig=!KK6wyv,B$q=1>O;7j%]W[Z5.,Q*/OuYa%T|SE};u:W0@ROj' );
define( 'LOGGED_IN_SALT',   ']6&>=7|91bA$aor^W){2?TCrcljCDP[Z0Nq]IvIRv/S8+u3=w!=2.9a]>}!+REHV' );
define( 'NONCE_SALT',       '!ROM4v{M-/m7K4|{rgd4b:FRRKgKFJ__O}eGy&]RFfNMIVh5SIhX[YZwy]Q:C!Jq' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
