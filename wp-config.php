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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'lyskovlv_repet' );

/** Database username */
define( 'DB_USER', 'lyskovlv_repet' );

/** Database password */
define( 'DB_PASSWORD', 'c1vOGW*7' );

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
define( 'AUTH_KEY',         'a?vE,6@a+I&g#.jG=jMEssR!6e{YKd73>#[UM5,^C8S*[BlOjb.^Lw4;nOMV@M[e' );
define( 'SECURE_AUTH_KEY',  'w/>Vhr|nxR@^xPP9NitbNm(i FX,$~mf?qwJOJX8882PSG%-$RI-Hz_rEF(UfW4K' );
define( 'LOGGED_IN_KEY',    'ssK9uid~g2LCz`~LVf&*msKLnHf -y8jRu-rXl_qiHw~Vp}#+=s>;m/Vfp#6N1nz' );
define( 'NONCE_KEY',        '+~b=vB)DVl_3H]@N!U(I`/|-sTV=&cy!Q&V}P$E0NCnM02ss.&d%H-1=btPgblaN' );
define( 'AUTH_SALT',        '}1@I&e@dcrM-1+Hbpdt:q~:0c`LuXVFg^)x :tvFF1Jt[#pi;X76[QP0`m+-nc,/' );
define( 'SECURE_AUTH_SALT', 'WKPndR]VqL!7aq;q))$3!bVYHWl&&gfbu-$3~`Rt^4i>eawSXo9k-r`@yf+keG?L' );
define( 'LOGGED_IN_SALT',   'b ;He_W%SQh0Ta&&O%!:&6>24WwAb^c2n&<&KV5cuc(|&H(G t}iDfx;n-]Y~^W)' );
define( 'NONCE_SALT',       'ZYwak%^l/,D9qOtTq|t vEn=Oj)1Z0B&z1VS9)#NK{hDKKlVEYj(m@>#c;MbhQoU' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
