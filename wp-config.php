<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wpatomneto');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'l|Oe&K^q[8G_ROwX |+o!9`7dai$w+Z#~w?Gj {SefpcCawT:ST!V.JK@s]Il@Aj');
define('SECURE_AUTH_KEY',  'oScPQ7*2-m=XhoEUM#wc#C!k&D=)NzVHNSJ02md0ooE^Q=Yq|Kmm7[yzYL1ILw6$');
define('LOGGED_IN_KEY',    'O-*?Q,&;4?W9*784>Tka3!:Bdx ^jo>+9yiaLP{EWuW#CT!5QN*:(=~[fk-:!,Fy');
define('NONCE_KEY',        '|RlcgSMfN@Vw%^}y~G~4KXwCKPb-,o@.Ac$)N-c%3PI|>kVR++}[57iMZ(]QYu+1');
define('AUTH_SALT',        '1&ax3*dg334WpZPh-y9kGjBW^/=)v+,i{0NJ#bEuEPKT+czil!|sjqcyO+N%8SVW');
define('SECURE_AUTH_SALT', 'PAmLzjFJrS-*Cf bO59ccFH_nDb;TtPPB?VNK^3t+MI[|f-COV;5smK_8_}t0G:~');
define('LOGGED_IN_SALT',   'o8NnB]w3|S(v2`|+I+oWMcQsH067XW~Kr+P.ZNz^{<q&Zz+q-U~lk{p|S/[B#9yF');
define('NONCE_SALT',       'k7ey9i#|F9}he:99e(-s2;%!uDEZVAA+[~0cq1zh_b/1Ep,/O2#%)Z.KI1K)Y|S-');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
