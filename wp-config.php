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
define( 'DB_NAME', 'rcadit' );

/** MySQL database username */
define( 'DB_USER', 'rcadit' );

/** MySQL database password */
define( 'DB_PASSWORD', 'qNFOXCLDi4RFaqnDGzEkAcs8' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql' );

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
define( 'AUTH_KEY',         'L0?1,B]7br8VI6oHussPQs157MF)!1]#O4wt9q,kt_4IWj1 Rc7zPxNqSmwXN}7D' );
define( 'SECURE_AUTH_KEY',  'gd9Cr4T%*aY%jQnN<^6atNy||fo+i0_puXG>eHg([ clS+Rr;P,/1Gz)(n~yK/B;' );
define( 'LOGGED_IN_KEY',    'xu9+mU*ss!P^]0~br#2X>HHojzHUp6[~il=Tvn9UZBWBeUdcgz$PT&3qNH:,Uu>y' );
define( 'NONCE_KEY',        'rO^ tCS,YlpK.;-ndnc#n]%c#oqHmoHV,s5*QiX84}3uT%C0MmBOE}t/2_I7-dCq' );
define( 'AUTH_SALT',        'A>te 6)}^Yu$t4yfUBkGO!L(af5gj3_}];S(yEXxj( N]%4m.<7V)FIH^{4uMrq0' );
define( 'SECURE_AUTH_SALT', '!/,KhfaM.9K47Q|)fFlC{~LPbG+~cd-s&$C51)rxH-zZ$/~9n-}-$bQm*j[<K$Y`' );
define( 'LOGGED_IN_SALT',   'yqV mXxBYk=DHi93>AwLu]@cTYz|Kml5NlLY9>!fKKgv@3d?/Fr;-^Hrvo(I:UNN' );
define( 'NONCE_SALT',       'J:a=/eP2b4fzOkM!|4l0`Ha&edztYXKC5+LD$b.=4LE]$M#c{W:g$n&17=FKN@ez' );

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

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
