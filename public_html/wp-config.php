<?php
// ------- FTP CONFIG -------
define('FTP_HOST', '127.0.0.1');
define('FTP_USER', 'wordpress@demo.localgov59.in.th');
define('FTP_PASS', 'TIsGEycOiS0');
define('FTP_BASE', '/public_html/');

// disable cron by traffic, please use cronjob instead.
define('DISABLE_WP_CRON', true);

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
define('DB_NAME', 'demo59_wp');

/** MySQL database username */
define('DB_USER', 'demo59_wp');

/** MySQL database password */
define('DB_PASSWORD', 'p0rHe32Rg3FPW4p');

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
define('AUTH_KEY',         'V(<VyUJm|iSHq>)+%iBlBBK+T+[/{*/Fk0AkR>4tn,]mO-^l_%@xP 3B#Y1KG|#B');
define('SECURE_AUTH_KEY',  'e7]9^<1;gc|=3OyYu`.0RISu,=31T*-HZ5o;MJ%TlDg#NFiR>Y|s(VfPA8`g/@E+');
define('LOGGED_IN_KEY',    '#Hak|K38:FAVGP1}ocDt=Fn{-.ON[cv~dBkSNkl^Sg6re^MB0DYw`5gL--qK^9!k');
define('NONCE_KEY',        ' 2NuOCWX$|n5<:1ws%G;v$-_{/7x`|5+!xHKqbU1gY-V~WeBwoUv-_!A4|M^+|cu');
define('AUTH_SALT',        'lD;:6vWNQqEr}x^i9GC<1|>-e^KXN{:<3_:ZzSO|FX2]LT4vME7*^O!/ka~S50r-');
define('SECURE_AUTH_SALT', '*-k<)b/B`KX9>Ax^z37-P61>m_Y[=|%W0!:,9ZG(Vu.|GHHL@sz]1zuhAi9iwGMO');
define('LOGGED_IN_SALT',   '`8E]Ex<Solj,s_,F#[#r_!!U[()n)rps<M9zva4;iiCz`JSpS<Ws3.$fP-W_S Z_');
define('NONCE_SALT',       'V9$d_Xyni]tj:J65:UWk(}y6J]Ae!x}^N52MC1@=KyfqB3)m&T!1M;AC-efyS_NH');


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
define('WPLANG', 'th');

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
