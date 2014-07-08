<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'framework');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'R`|{^G|ZZW;%TiUnN%{[4@:1Y{J`m_cblPN,-A],m;O-8581kktwXP&au|Y.U#W-');
define('SECURE_AUTH_KEY',  'B#+nn)Tjmf0Fri9JS+){3Pn^o%yUN99Eh&1$V,d+&9?%B:4>1y)q5sm2su{8e=_r');
define('LOGGED_IN_KEY',    '(]TjeE;YX1o!kP@B#~!1fr[_=GE~-=t4U]pN4:iQgvo1OX*2KZI%Ng^|5!er?E35');
define('NONCE_KEY',        '/KJA9;u- /h{0&X-ynNEB<aVC0y@`FR-R]bg&HbT,+>yO%TW!e7+6o(^0QwSW|hz');
define('AUTH_SALT',        'zh8Cd3I]YUb[Ml<s-rw9=Km`;X}VCQo|o)Khm-d#g7d)7u[fW:TS-3(h9+xsW+7#');
define('SECURE_AUTH_SALT', 'A^]A5IJj7#6Kj*=+(+m2q{+W@{-UNk/1;>#R(&;RmneZ6YB9^MAC:Tx^Zak-OdgL');
define('LOGGED_IN_SALT',   '#R-,8,2iNF,)nvwBQjI!RP{>`4qKp1H#$5Be7|lL)+~ 6)OOcfNA-5/p0ARz:@Eq');
define('NONCE_SALT',       'b/tdXsQ0B+&81(YvG;^4CfpexH~H^.JjODrxE+Ez:=-!z/Ki5W~(6WH a04.- JO');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
