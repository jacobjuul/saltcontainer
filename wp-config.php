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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');
define('RELOCATE',true);
/** MySQL database password */
define('DB_PASSWORD', '18683286e28edcb3f36295d56a4fa6c0a04aa4883b5beffc');
define('WP_HOME','http://saltcontainer.org');
define('WP_SITEURL','http://saltcontainer.org');


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
define('AUTH_KEY',         '~yzC7ApLbCl#4$D@z,S!qB3fzKhv4|pmNCXGX%](#H!-JO}sEc]5PFqZz<2q&e#_');
define('SECURE_AUTH_KEY',  'ej`yS55Okl^Y.(>F6ngFRKPr0eD:;SbSWiauD2|*txo99B3Z&@zNU%B(K|6~-bSM');
define('LOGGED_IN_KEY',    '|Y/#Cg;WQ oxP<vcE!$u4 C(wq91DKaC=/8d(AUiA^Ry9N1M?><&B&+CAM!)$`K%');
define('NONCE_KEY',        '#(lm&ck{uN`%k /@5Y^0#p!Ag`[7*bi]:pbeg{lr5N7zP!5DPaEx.?O2eN;IHKOU');
define('AUTH_SALT',        'A,6GAv?|#`-$|.J#4eMH^d]ML&>%xlDtRcF,51^BI4UP!eN=!{}.MVCZ`]J 3<yL');
define('SECURE_AUTH_SALT', '=!4S5)zTOrP:3}G#i )Ky(w$CD$B1n~ez<:jC)/p%cIAe4svF0_WeL5IU(PG$e.{');
define('LOGGED_IN_SALT',   'x.F=w$fjGtu2S2uK|:DuKp2t77YPRPIHSh-KtN$/+0VqB;aWHF<0!`[6F].vIkiB');
define('NONCE_SALT',       'fVvv7b9L34scR*EIjn5YB%[@j_2S5SoM|dRwc_;w R-*SogPNKsfe~BD4+3LuE_b');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
