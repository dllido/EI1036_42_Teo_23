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
define( 'DB_NAME', '4169321_wpressd9aa5249' );

/** Database username */
define( 'DB_USER', '4169321_wpressd9aa5249' );

/** Database password */
define( 'DB_PASSWORD', 'Uxgfo95el3iqKpQ8rQuRiJ_Q1ezXEly6' );

/** Database hostname */
define( 'DB_HOST', 'fdb32.runhosting.com' );

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
define( 'AUTH_KEY',         'uuu}?oox_-Bq_Ez+LFNUpI=3xyGbOp<jJb(6C^RyT!ekfV%HkV?t&.rI(;8{Y`E0' );
define( 'SECURE_AUTH_KEY',  '{7IQvm+6: BNS?{@[z|?EaRMr/W**I$Kxd^+|@NRRo[/pyEcjR;z!5OeEk!S<1%)' );
define( 'LOGGED_IN_KEY',    'I( {[s<s-YVDMVwDE.{WzJ{V13*5~=h$_#=z`n6=#yDO907Uw{Dk`[gqct,4@=?d' );
define( 'NONCE_KEY',        ' ;dckc*LIT5Lcd9A9lG?`EO^GkNhUn]eUfRM:]z(-gGPfIw@V!!Jw<;~5]mWU5>l' );
define( 'AUTH_SALT',        '<)IUM9q&9`^ W=MI{-kZ^~ev~L?jk#>^i3#(}A]1h?M-*HU24x=Ar5C$K<%,Z0Lc' );
define( 'SECURE_AUTH_SALT', 'oXa9/i` #>J8y=HOA43WM,^?3lEcd`e2%$ldo0QUlQ*P&t+VkjSF!(fl.1N:DU2q' );
define( 'LOGGED_IN_SALT',   'x`ic2HLK&[r7dw2>S$`/EPU[tvbV`5sH3d,Se~!mTl|^t|SS#P22CW_*y6)~#PKw' );
define( 'NONCE_SALT',       'grC=N=jhR9 zxmm69hPao2T2a8c)V#AX#;DR&,@Jw7hFw@9=Lvk:5Q l_]~Jz;))' );

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
define( 'WP_DEBUG', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
