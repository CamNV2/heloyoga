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
define( 'DB_NAME', 'helo_coaching_online' );

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
define( 'AUTH_KEY',         'qqOr5fHMC8gZG/DOwq2CRa?A6+*xOC)!`Ch}<7xcCnG]q$Ibxo%5_XG9lPe3K(/n' );
define( 'SECURE_AUTH_KEY',  '|zoI;4yC;@r uIoo66|C,e.R;H{>}z)gI}a5sAy^y@h?n<`/+  5ARvSk=NuO<k@' );
define( 'LOGGED_IN_KEY',    '<Us^!3!c9mQs4t<2JU+EO$/K;8PEhlR7(ps1U([7%-;{3_Yy1>l{LE{-*i0nVBPf' );
define( 'NONCE_KEY',        '{xAwylfKO{:r5Lrg.1_=*(0RETY;Yd|4<XY(?M~]pVur~yC9fRQ}kaZm03SVI(:3' );
define( 'AUTH_SALT',        'It`^)z6aloz}phk&j6+0xXctSk4G3x0WYU5:8-?P?h)4x=VtPQCn`[40^n/Jk3c0' );
define( 'SECURE_AUTH_SALT', 'PHXo}X)$hNn#P}W$f=q+b_i( sqaF@H,#wKE4:2yPF/R^;3vaVLw>[9c_WKW)brq' );
define( 'LOGGED_IN_SALT',   'S3S_`dI<1F[H4,@9*k|8e/ugLp}~|}*IO`@KCb9i(lU<Vg@f*HJMy1?g[32gZMXJ' );
define( 'NONCE_SALT',       '_?MLQBZ;I&Z:851wLFB1vy?g o|jOQzG2JZ;]!3JE2$GSuxf+Q{5DS/>DhpSxQb{' );

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
