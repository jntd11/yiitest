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

define('DB_NAME', 'navabrindavanam_wp');



/** MySQL database username */

define('DB_USER', 'navabrind');



/** MySQL database password */

define('DB_PASSWORD', 'RagavA_123');



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

define('AUTH_KEY',         '2W.j4`,ypFsaY2VE5+-}JKL5+#3xV#zci7Qf>FI#}lGUpiEu]j2O~,%7+=#N~Lx5');

define('SECURE_AUTH_KEY',  'i,FZCmid5m/U]Uce4YjV.d`4rfD9jvGJ)d/vnP1|EYTW>OF>L05bISO|93,V2>bw');

define('LOGGED_IN_KEY',    '{$ pQr!E@y{AH|{ox![lWMq3qu|s$TPf}T06x@,@a0WK+BFVkM5+He14UgBlO(=v');

define('NONCE_KEY',        '||eHo%7gpj*ZBvjpz@3ItA6M~0N!D#XJ9;p>.{A{4{tc3h57u+BeZBkj?RKn>ylO');

define('AUTH_SALT',        '6|KwA*zoNJH34EBMsjq|$|,> srL<w[Im;3s=9{bFxxCSCiuS<ZmBNExK9{(w]2b');

define('SECURE_AUTH_SALT', '=|R.1Os?}j3Gw{w*kP=~!%a%sI};*)+/V B9yzQ@a;&xgj(_7Zf>a2]=ZDnZZ,wD');

define('LOGGED_IN_SALT',   'Lk(*acuSqk_8EV Xp@k!fZu,v&1*s+X!FV^V8)([8^[=~WH}bHpK[w~qIW[AT#pj');

define('NONCE_SALT',       '1IisHZeAUR*W:r K w)E3]xj*eYK~6x}|::cVms*WAdCSsi9q_SZ9S[j92i0)q0~');



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

