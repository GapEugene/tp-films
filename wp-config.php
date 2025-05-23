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
define( 'DB_NAME', 'tp-films' );

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
define( 'AUTH_KEY',         '4M[{2=kZ@CZ0DDQ].) kr;![/a>W$&Ivfxf4wVe`(9~bT6&~lP._Ua,ctA]ujqap' );
define( 'SECURE_AUTH_KEY',  'kh~#t>}Pk/[=-t$,wlmpqnk|@5@}#HMCGLI>h5jbvpN_(9QbKu7l*V4W~gYk4K9,' );
define( 'LOGGED_IN_KEY',    'u=aOckSSDko-B(If0S!(RM#x[+*X[Pp:&;F.U1+Eh0$h/`=K8~qxyg<frnmif2nE' );
define( 'NONCE_KEY',        'cKo|1k#C|Pu$FciF[Cc x^3K}33Yz<Ix:Gp%P=,vKY6tp,WP U)f(!53<EOzwFX8' );
define( 'AUTH_SALT',        'YeVlkn7nlC%ooB@n!lumpC@<kSpWi$Z7<F=H4#YS]v[YVw3=H~[ 0FcN2vn6kx3H' );
define( 'SECURE_AUTH_SALT', 'baUw/t}E2TvB!8yd|Qn8GA~0TlU~Lf^dr`4=8]d&~X9g8[*4f{n.=|?Y&4@(+A54' );
define( 'LOGGED_IN_SALT',   '!FLmAb~_.]1)k7v-TqY 9r|[A>eC{8lw $*aZtPs}6![ BI(YnkX<8*nF43Yt4I*' );
define( 'NONCE_SALT',       'm]rRCvxLl9~=I,;!B`Y~Z:Oku/OU62zz_:ORB9TT>d?wZeRo1bc@=1u( Sb13Fhd' );

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
$table_prefix = 'tpf_';

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
