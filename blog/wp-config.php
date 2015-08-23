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
define('DB_NAME', 'apaiserc_wp');

/** MySQL database username */
define('DB_USER', 'apaiserc_root');

/** MySQL database password */
define('DB_PASSWORD', '@ccess!1');

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
define('AUTH_KEY',         'W5gekVqB>VgW;tPLMHYub?(lxg[,w(AjgTr&0!Z[(Vh2Rrp8@._u`w^CHg6T<|Uq');
define('SECURE_AUTH_KEY',  ',/Pz8N~f`DeLz&DmS85I=7PQO@.,UYmWLS+_cqiwPT&3-mukd|,j2Z!08pQZ4)%g');
define('LOGGED_IN_KEY',    'n_:c3yzkI}g.+4Czp-SdHca,Qc=]gtxU}L{AcR`l?=~,Z*T$*AuW*>=24VrUH2bb');
define('NONCE_KEY',        'pz .Hi-|^n7ePHV*qG%t(>3B-xJTF~-3$.poFBdS x:mh)@v)Z+a;{R*_ 1b$o-U');
define('AUTH_SALT',        'm0lw%}Y;`YL0=e]QfPAjh!pB6uY30zl]t39ky1t E<obreY:t.W3HMYt>R N|mzd');
define('SECURE_AUTH_SALT', '<+U}Ba1EpIF|Ui^hu!!!XfN;ocK}qBO~!0c_kq74G>0p<&54QWp)C0NZFyQY G<Y');
define('LOGGED_IN_SALT',   '6CKbiD5a7pe` 8IF#`<v$85NZ}tE8#6Tm<{vf1Iq-%)q2.dq@=5 :b(:b3~9E*K=');
define('NONCE_SALT',       'O6hVuyN)3Vv;qE7H.rSdJF6EL6^09N<- {|2=|9/oC[5MST_oJh_Cw>.7BKW#:z!');

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
